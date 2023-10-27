<?php

class Kasir extends Controller
{
	protected $model = 'Menu_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Menu';
		$data['user'] = $this->user;
        $data['menu'] = $this->model('Menu_model')->getAllData();
		
		$this->view('kasir', $data);
	}

    public function insert()
    {
        if ($this->model('Menu_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/menu");
            exit;
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Menu_model')->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

	public function store()
	{
	}

	public function update()
	{
        if ($this->model('Menu_model')->update($_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</>', 'success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
	}

    public function getUbah()
    {
        echo json_encode($this->model('Menu_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
