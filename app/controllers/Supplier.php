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
		
		$this->view('stok/supplier', $data);
	}

    public function insert()
    {
        if ($this->model('Supplier_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/supplier');
        exit;
    }

    public function delete($id)
    {
        if ($this->model('Supplier_model')->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/supplier');
        exit;
    }

	public function store()
	{
	}

	public function update()
    {
        if ($this->model('Supplier_model')->update($_POST['id'], $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/supplier');
        exit;
    }


    public function getUbah()
    {
        echo json_encode($this->model('Supplier_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
