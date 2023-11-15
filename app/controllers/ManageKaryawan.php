<?php

class Managekaryawan extends Controller
{
    protected $model = 'Managekaryawan_model';

    public function index()
    {
        $this->auth('user');

        $data['title'] = 'Manage Karyawan';
        $data['user'] = $this->user;
        $manageModel = $this->model('Managekaryawan_model');
        $data['Managekaryawan'] = $manageModel->getAllData();

        $this->view('Managekaryawan', $data);
    }

    public function detail($id)
    {
        $this->auth('user');

        $data['title'] = 'Detail Karyawan';
        $data['user'] = $this->user;
        $manageModel = $this->model('Managekaryawan_model');
        $data['Managekaryawan'] = $manageModel->getDataById($id);

        $this->view('detailKaryawan', $data);
    }


    public function insert()
    {
        if ($this->model('Managekaryawan_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/Managekaryawan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Managekaryawan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Managekaryawan_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/Managekaryawan');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Managekaryawan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Managekaryawan_model')->update($_POST['id'], $_POST) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/Managekaryawan');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Managekaryawan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Managekaryawan_model')->getDataById($_POST['id']));
    }

    public function destroy()
    {
    }
}
