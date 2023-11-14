<?php

class KategoriSP extends Controller
{
	protected $model = 'KategoriSP_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Kategori Surat Peringatan';
		$data['user'] = $this->user;
        $data['kategori'] = $this->model('KategoriSP_model')->getAllData();
		
		$this->view('kategoriSP', $data);
	}

    public function insert()
    {
        if ($this->model('KategoriSP_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/kategoriSP");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategoriSP');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('KategoriSP_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kategoriSP');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategoriSP');
            exit;
        }
    }

	public function update()
    {
        $id = $_POST['id']; 
        $data = $_POST; 

        if ($this->model('KategoriSP_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kategoriSP');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategoriSP');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('KategoriSP_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
