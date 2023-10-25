<?php

class Menu extends Controller
{
	protected $model = 'Menu_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Menu';
		$data['user'] = $this->user;
        $data['menu'] = $this->model('Menu_model')->getAllData();
		
		$this->view('menu', $data);
	}

    public function insert()
    {
        if ($this->model('Menu_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/menu");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Menu_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
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

        if ($this->model('Menu_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
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
