<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class kelolaStok extends Controller
{
	protected $model = 'kelolaStok_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Home';
		$data['user'] = $this->user;
        $data['stok'] = $this->model('kelolaStok_model')->getAllData();
        $data['tanggal'] = $this->model('kelolaStok_model')->getTanggal();
        $data['pemasukan'] = $this->model('Pemasukan_model')->getAllData();
        $data['barang'] = $this->model('daftarBarang_model')->getAllData();

		
		$this->view('kelolaStok', $data);
	}

    public function insert()
    {
        if ($this->model('kelolaStok_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/kelolaStok");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kelolaStok');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('kelolaStok_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kelolaStok');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kelolaStok');
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

        if ($this->model('kelolaStok_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kelolaStok');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kelolaStok');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('kelolaStok_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
