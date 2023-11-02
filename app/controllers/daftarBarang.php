<?php

class daftarBarang extends Controller
{
	protected $model = 'daftarBarang_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Daftar Barang';
		$data['user'] = $this->user;
        $data['barang'] = $this->model('daftarBarang_model')->getAllData();
        $data['supplier'] = $this->model('Supplier_model')->getAllData();

		
		$this->view('daftarBarang', $data);
	}

    public function insert()
    {
        if ($this->model('daftarBarang_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/daftarBarang");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/daftarBarang');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('daftarBarang_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/daftarBarang');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/daftarBarang');
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

        if ($this->model('daftarBarang_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/daftarBarang');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/daftarBarang');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('daftarBarang_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
