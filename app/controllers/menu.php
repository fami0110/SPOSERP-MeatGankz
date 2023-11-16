<?php

class Menu extends Controller
{
	protected $model_name = 'Menu_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Menu';
		$data['user'] = $this->user;
        $data['menu'] = $this->model($this->model_name)->getAllData();
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
		
		$this->view('menu/index', $data);
	}

    public function insert()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
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
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Deletet&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Deletet&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

	public function update($id)
	{
        if ($this->model($this->model_name)->update($id, $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
	}

	public function updateStatusMenu($id, $status)
	{
        if ($this->model($this->model_name)->updateField($id, 'tersedia', $status) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
	}

    public function getUbah($id)
    {
        echo json_encode($this->model($this->model_name)->getDataById($id));
    }

	public function destroy()
	{
	}
    
}
