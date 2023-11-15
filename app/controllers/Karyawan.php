<?php

class Karyawan extends Controller
{
    protected $model_name = 'Karyawan_model';

    public function index()
    {
        $this->auth('user');

        $data['title'] = 'Manage Karyawan';
        $data['user'] = $this->user;

        $data['karyawan'] = $this->model($this->model_name)->getAllData();

        $this->view('Managekaryawan', $data);
    }

    public function detail($id)
    {
        $this->auth('user');

        $data['title'] = 'Detail Karyawan';
        $data['user'] = $this->user;

        $data['karyawan'] = $this->model($this->model_name)->getDataById($id);

        $this->view('detailKaryawan', $data);
    }


    public function insert()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/karyawan");
            exit;
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function update()
    {
        if ($this->model($this->model_name)->update($_POST['id'], $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model($this->model_name)->getDataById($_POST['id']));
    }

    public function destroy()
    {
    }
}
