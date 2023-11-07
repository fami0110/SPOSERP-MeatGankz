<?php

class Penggajian extends Controller
{
    public function index()
    {
		$this->auth('user');

        $data['title'] = 'Penggajian';
		$data['user'] = $this->user;
        $data['surat'] = $this->model('SuratPeringatan_model')->getAllData();
        $this->view('penggajian', $data);

    }
    public function print($id)
    {

        $data['title'] = 'SURAT PERINGATAN ';
		$data['user'] = $this->user;
        $data['surat'] = $this->model('SuratPeringatan_model')->getDataById($id);
        $this->view('printSuratPeringatan', $data);
    }
    public function insert()
    {
        if ($this->model('SuratPeringatan_model')->tambahDataSurat($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/penggajian");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/penggajian');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model('SuratPeringatan_model')->hapusDataSurat($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/penggajian");
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/penggajian');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('SuratPeringatan_model')->getDataById($_POST['id']));
    }
    public function update()
    {
        $id = $_POST['id'];
        $data = $_POST;

        if ($this->model('SuratPeringatan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/penggajian');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/penggajian');
            exit;
        }
    }
    public function cari()
    {
        $data['judul'] = 'SURAT PERINGATAN';
		$data['user'] = $this->user;
        $data['surat'] = $this->model('SuratPeringatan_model')->cariDataSurat();
		$this->view('suratPeringatan', $data);
    }
}