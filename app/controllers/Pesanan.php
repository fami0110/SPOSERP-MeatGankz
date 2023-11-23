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

    public function kasir()
    {
		$this->auth('user');

		$data['title'] = 'Kasir';
		$data['user'] = $this->user;
        
        $data['menu'] = $this->model('Menu_model')->getAllData();
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
        $data['pajak'] = $this->model('Preferences')->getPreference('Besar_Pajak_(%)');
        $this->model('Menu_model')->countAvailableAll();
		
		$this->view('penjualan/kasir', $data);
	}

    public function invoice($id = null)
	{
		$this->auth('user');

		$data['title'] = 'Invoice';
		$data['user'] = $this->user;
        
        $data['pembayaran'] = ($id) ?
            $this->model($this->model_name)->getDataById($id) :
            $this->model($this->model_name)->getLatestData();
        $data['pajak'] = $this->model('Preferences')->getPreference('Besar_Pajak_(%)');

		$this->view('penjualan/invoice', $data);
	}

    public function insert()
    {
        // Proses detail pembayaran untuk invoice
        $detail_pembayaran = [];
        foreach ($_POST['id'] as $i => $id) {
            array_push($detail_pembayaran, [
                'id' => $id,
                'item' => $_POST['item'][$i],
                'amount' => $_POST['amount'][$i],
                'subtotal' => $_POST['item_subtotal'][$i],
            ]);
        }
        $_POST['detail_pembayaran'] = json_encode($detail_pembayaran);
        unset($_POST['item']); unset($_POST['amount']); unset($_POST['item_subtotal']); unset($_POST['id']);

        $_POST['status_order'] = 0; 

        echo '<pre>';
        print_r($_POST); die;
        // Cek apakah stok menu tersedia atau tidak

        // insert data pembayaran
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/pesanan/invoice');
        exit;
    }

	public function updateStatusPesanan($id)
	{
        if ($this->model($this->model_name)->updateField($id, 'status_order', 1) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
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
