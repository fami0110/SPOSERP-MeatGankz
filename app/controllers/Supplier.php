<?php

class Supplier extends Controller
{
	protected $model = 'Supplier_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Home';
		$data['user'] = $this->user;
        $data['supplier'] = $this->model('Supplier_model')->getAllData();
		
		$this->view('supplier', $data);
	}

    public function insert()
    {
        if ($this->model('Supplier_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/supplier");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Supplier_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

	public function store()
	{
	}

	public function update()
    {
        $id = $_POST['id']; // Pastikan id diperoleh dari $_POST
        $data = $_POST; // Gunakan seluruh data dari $_POST

        if ($this->model('Supplier_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Supplier_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
