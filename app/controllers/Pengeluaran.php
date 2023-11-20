<?php

class Pengeluaran extends Controller
{
	protected $model = 'Pemasukan_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Pengeluaran';
		$data['user'] = $this->user;
        $data['pemasukan'] = $this->model('Pemasukan_model')->getAllData();
        $data['supplier'] = $this->model('Supplier_model')->getAllData();
        $data['barang'] = $this->model('daftarBarang_model')->getAllData();

		
		$this->view('pengeluaran', $data);
	}

    public function insert()
    {
        if ($this->model('Pemasukan_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/pemasukan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Pemasukan_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        }
    }

	public function store()
	{
	}

	public function update()
    {
        $id = $_POST['id']; 
        $data = $_POST; 

        if ($this->model('Pemasukan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Pemasukan_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
