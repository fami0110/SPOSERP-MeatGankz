<?php

class Pesanan extends Controller
{
	protected $model_name = 'Pembayaran_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Pesanan';
		$data['user'] = $this->user;
        $data['pembayaran'] = $this->model($this->model_name)->getAllData();

		$this->view('penjualan/pesanan', $data);
	}

    public function kasir($id = null)
    {
		$this->auth('user');

		$data['title'] = 'Kasir';
		$data['user'] = $this->user;
        
        $data['menu'] = $this->model('Menu_model')->getAllData();
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
        $data['pajak'] = $this->model('Preferences')->getPreference('Besar_Pajak_(%)');
        $this->model('Menu_model')->countAvailableAll();
		
        if (!$id) {
            $this->view('penjualan/kasir', $data);
        } else {
            $data['pesanan'] = $this->model($this->model_name)->getDataById($id);
            $this->view('penjualan/edit', $data);
        }
	}

    public function invoice($uuid = null)
	{
		$this->auth('user');

		$data['title'] = 'Invoice';
		$data['user'] = $this->user;
        
        $data['pembayaran'] = ($uuid) ?
            $this->model($this->model_name)->getDataByUuid($uuid) :
            $this->model($this->model_name)->getLatestData();
        $data['pajak'] = $this->model('Preferences')->getPreference('Besar_Pajak_(%)');

		$this->view('penjualan/invoice', $data);
	}

    public function insert()
    {
        // Proses detail pembayaran untuk invoice
        $detail_pembayaran = [];
        foreach ($_POST['id'] as $i => $item_id) {
            array_push($detail_pembayaran, [
                'id' => $item_id,
                'item' => $_POST['item'][$i],
                'amount' => $_POST['amount'][$i],
                'subtotal' => $_POST['item_subtotal'][$i],
            ]);
        }
        $_POST['detail_pembayaran'] = json_encode($detail_pembayaran);
        unset($_POST['item']); unset($_POST['amount']); unset($_POST['item_subtotal']); unset($_POST['id']);

        $_POST['status_order'] = 0; 

        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/pesanan/kasir');
        exit;
    }

    public function update($id)
    {
        // Proses detail pembayaran untuk invoice
        $detail_pembayaran = [];
        foreach ($_POST['id'] as $i => $item_id) {
            array_push($detail_pembayaran, [
                'id' => $item_id,
                'item' => $_POST['item'][$i],
                'amount' => $_POST['amount'][$i],
                'subtotal' => $_POST['item_subtotal'][$i],
            ]);
        }
        $_POST['detail_pembayaran'] = json_encode($detail_pembayaran);
        unset($_POST['item']); unset($_POST['amount']); unset($_POST['item_subtotal']); unset($_POST['id']);

        $_POST['status_order'] = 0; 

        if ($this->model($this->model_name)->update($id, $_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/pesanan/kasir');
        exit;
    }

	public function updateStatusPesanan($id)
	{
        $pesanan = $this->model($this->model_name)->getDataById($id);
        $detail_pembayaran = json_decode($pesanan['detail_pembayaran'], true);

        try {
            // Cek apakah stok menu tersedia atau tidak
            $selected_menu = array_combine(array_column($detail_pembayaran, 'id'), array_column($detail_pembayaran, 'amount'));
            $data_menu = $this->model("Menu_model")->getMultipleBy('id', array_keys($selected_menu));
            $tersedia = true;
            $all_bahan = [];
            
            // Cek apakah item tersedia atau tidak
            foreach ($data_menu as $menu) {
                if ($menu['tersedia'] <= 0) {
                    $tersedia = $menu['nama'];
                    break;
                }

                // Tambahkan dan kalikan data bahan berdasarkan amount
                $bahan = json_decode($menu['bahan'], true);
                foreach ($bahan as $key => $val) {
                    $bahan[$key] = $val * $selected_menu[$menu['id']];
                }
                array_push($all_bahan, $bahan);
            }

            // Proses data bahan jika tersedia
            if ($tersedia === true) {
                // Sum all bahan
                $sum_bahan = [];
                foreach ($all_bahan as $bahan) {
                    foreach ($bahan as $key => $val) {
                        if (array_key_exists($key, $sum_bahan)) {
                            $sum_bahan[$key] += $val;
                        } else {
                            $sum_bahan[$key] = $val;
                        }
                    }
                }

                // Tambah data pengeluaran stok hari ini
                $stok = $this->model('Stok_model')->getMultipleBy('nama', array_keys($sum_bahan));
                foreach ($stok as $item) {
                    $riwayat = json_decode($item['riwayat'], true);
                    $current_pengeluaran = isset($riwayat[date('Y-m-d')]) ?
                        $riwayat[date('Y-m-d')]['keluar'] : 0;

                    $this->model('Stok_model')
                        ->updateStok($item['id'], date('Y-m-d'), ['keluar' => ($current_pengeluaran + $sum_bahan[$item['nama']])]);
                }

                // Cek ketersediaan menu setelah stok berkurang
                foreach ($data_menu as $menu) {
                    $this->model('Menu_model')->countAvailable($menu['id']);
                }
                
                // Update status pesanan
                if ($this->model($this->model_name)->updateField($id, 'status_order', 1) > 0) {
                    Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
                    header('Location: ' . BASEURL . '/pesanan/invoice/' . $pesanan['uuid']);
                    exit;
                } else {
                    throw new Exception('Haha error');
                }
            } else {
                Flasher::setFlash("{$tersedia} yang telah habis!", 'danger');
            }
        } catch (Exception $e) {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/pesanan');
        exit;
	}

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/pesanan');
        exit;
    }

    public function getUbah()
    {
        echo $this->model($this->model_name)->getDataById($_POST['id'])['detail_pembayaran'];
    }

	public function destroy()
	{
	}
}
