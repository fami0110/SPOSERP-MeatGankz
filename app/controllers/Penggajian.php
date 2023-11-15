<?php

class Penggajian extends Controller
{
    protected $model_name = 'Karyawan_model';

    public function index()
    {
		$this->auth('user');

        $data['title'] = 'Penggajian';
		$data['user'] = $this->user;

        $data['karyawan'] = $this->model($this->model_name)->getAllData();
        $data['surat'] = $this->model('SuratPeringatan_model')->getAllData();
        $data['kategori'] = $this->model('KategoriSP_model')->getAllData();
        
        $this->view('karyawan/penggajian', $data);
    }

    public function tambah()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/Penggajian");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Penggajian');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model($this->model_name)->hapusDataSurat($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/Penggajian");
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/Penggajian');
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('SuratPeringatan_model')->getDataById($_POST['id']));
    }
    public function update()
    {
        $id = $_POST['id'];
        $data = $_POST;

        if ($this->model('SuratPeringatan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
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