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
        $tmp = [];
        foreach ($_POST['item'] as $i => $item) {
            array_push($tmp, [
                'item' => $item,
                'amount' => $_POST['amount'][$i],
                'subtotal' => $_POST['item_subtotal'][$i],
            ]);
        }
        $_POST['detail_pembayaran'] = json_encode($tmp);
        unset($_POST['item']); unset($_POST['amount']); unset($_POST['item_subtotal']);

        $_POST['status_order'] = 0; 

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
