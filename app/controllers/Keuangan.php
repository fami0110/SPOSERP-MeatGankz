<?php

class Keuangan extends Controller
{
	protected $model = 'Keuangan_model';

	public function index()
    {
    $this->auth('user');

    $data['title'] = 'Home';
    $data['user'] = $this->user;
    $keuanganModel = $this->model('Keuangan_model');
    $data['Keuangan'] = $keuanganModel->getAllData();

    $totalKeseluruhan = 0; 

    foreach ($data['Keuangan'] as $item) {
        $totalItem = $item['quantity'] * $item['harga']; 
        $totalKeseluruhan += $totalItem; 
    }

    $data['totalKeseluruhan'] = $totalKeseluruhan;
    $this->view('Keuangan', $data);
    }


    public function insert()
    {
        if ($this->model('Keuangan_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/Keuangan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Keuangan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Keuangan_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/Keuangan');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Keuangan');
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

        if ($this->model('Keuangan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/Keuangan');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Keuangan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Keuangan_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}