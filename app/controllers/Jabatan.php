<?php

class Jabatan extends Controller
{
	protected $model = 'Jabatan_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Jabatan';
		$data['user'] = $this->user;
        $data['jabatan'] = $this->model('Jabatan_model')->getAllData();
		
		$this->view('jabatan', $data);
	}

    public function insert()
    {
        if ($this->model('Jabatan_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/jabatan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Jabatan_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }

	public function update()
    {
        $id = $_POST['id']; 
        $data = $_POST; 

        if ($this->model('Jabatan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/jabatan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Jabatan_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
