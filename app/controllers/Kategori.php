<?php

class Kategori extends Controller
{
	protected $model = 'Kategori_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Home';
		$data['user'] = $this->user;
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
		
		$this->view('kategori', $data);
	}

    public function insert()
    {
        if ($this->model('Kategori_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/kategori");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Kategori_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategori');
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

        if ($this->model('Kategori_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Kategori_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
