<?php 

class Controller_template extends Controller
{
	protected $model_name = 'Menu_model';

	public function index()
	{
		$this->auth('both');

		$data['title'] = 'Menu';
		$data['user'] = $this->user;
        $data['data'] = $this->model($this->model_name)->getAllData();
		
		$this->view('kasir', $data);
	}

    public function insert()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/');
        exit;
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/');
        exit;
    }

	public function update($id)
	{
        if ($this->model($this->model_name)->update($id, $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/');
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
