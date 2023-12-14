<?php 

class User extends Controller
{
	protected $model_name = 'User_model';

	public function index()
	{
        $this->auth('user', 'Superadmin');

        $data['title'] = 'User';
        $data['user'] = $this->user;
        
        $data['users'] = $this->model($this->model_name)->getAllUser();
        
        $this->view('admin/user', $data);
	}

    public function insert()
    {
        if ($this->model($this->model_name)->register($_POST['username'], $_POST['password'], $_POST['email']) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
    }

	public function update($id)
	{
        if ($this->model($this->model_name)->update($id, $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
	}

    public function getUbah()
    {
        echo json_encode($this->model($this->model_name)->getUserById($_POST['id']));
    }

	public function destroy($id)
	{
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
	}
}
