<?php

class Kategori extends Controller
{
	protected $model_name = 'Kategori_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Kategori Menu';
		$data['user'] = $this->user;
        $data['kategori'] = $this->model($this->model_name)->getAllData();
		
		$this->view('menu/kategori', $data);
	}

    public function insert()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
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
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        }
    }

	public function update()
    {
        if ($this->model($this->model_name)->update($_POST['id'], $_POST) > 0) {
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
        echo json_encode($this->model($this->model_name)->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
