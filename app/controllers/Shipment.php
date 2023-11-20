<?php

class Shipment extends Controller
{
	protected $model_name = 'Shipment_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Shipment';
		$data['user'] = $this->user;
        $data['shipment'] = $this->model($this->model_name)->getAllData();
        $data['barang'] = $this->model('Stok_model')->getAllData();
        $data['supplier'] = $this->model('Supplier_model')->getAllData();
        $barang = $this->model('Stok_model')->getAllData();

        $data['satuan'] = [];
        foreach ($barang as $item) {
            $data['satuan'][$item['id']] = $item['satuan'];
        }

		$this->view('stok/shipment', $data);
	}

    public function insert()
    {
        $_POST['tanggal'] = date('Y-m-d');

        if ($_POST['nama_biaya_lainnya'][0]) {
            $tmp = []; $i = 0;
            foreach ($_POST['nama_biaya_lainnya'] as $nama) {
                $tmp[$nama] = $_POST['biaya_lainnya'][$i];
                $i++;
            }
            $_POST['biaya_lainnya'] = json_encode($tmp);
        } else {
            $_POST['biaya_lainnya'] = "{}";
        }
        unset($_POST['nama_biaya_lainnya']);


        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/shipment');
        exit;
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/shipment');
        exit;
    }

	public function update()
    {
        if ($this->model($this->model_name)->update($_POST['id'], $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/shipment');
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model($this->model_name)->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
