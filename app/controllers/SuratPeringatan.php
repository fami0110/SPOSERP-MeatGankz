<?php

class suratPeringatan extends Controller
{
    protected $model_name = 'SuratPeringatan_model';

    public function index()
    {
		$this->auth('user');

        $data['title'] = 'Surat Peringatan';
		$data['user'] = $this->user;

        $data['surat'] = $this->model($this->model_name)->getAllData();
        $data['kategori'] = $this->model('KategoriSP_model')->getAllData();
        $data['Managekaryawan'] = $this->model('Karyawan_model')->getAllData();

        $this->view('suratPeringatan', $data);
    }

    public function print($id)
    {
        $data['title'] = 'Surat Peringatan';
		$data['user'] = $this->user;

        $data['surat'] = $this->model($this->model_name)->getDataById($id);
        $data['Managekaryawan'] = $this->model('Karyawan_model')->getAllData();

        $this->view('karyawan/printSuratPeringatan', $data);
    }

    public function tambah()
    {
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/suratPeringatan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/suratPeringatan');
            exit;
        }
    }
    public function delete($id)
    {
        if ($this->model($this->model_name)->hapusDataSurat($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header("Location: " . BASEURL . "/supplier");
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model($this->model_name)->getDataById($_POST['id']));
    }

    public function update()
    {
        if ($this->model($this->model_name)->update($_POST['id'], $_POST) > 0) {
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
        $data['surat'] = $this->model($this->model_name)->cariDataSurat();
		$this->view('suratPeringatan', $data);
    }
}