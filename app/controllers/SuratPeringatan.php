<?php

class suratPeringatan extends Controller
{
    public function index()
    {
		$this->auth('user');

        $data['title'] = 'SURAT PERINGATAN';
		$data['user'] = $this->user;
        $data['surat'] = $this->model('SuratPeringatan_model')->getAllData();
        $data['kategori'] = $this->model('KategoriSP_model')->getAllData();
        $data['Managekaryawan'] = $this->model('Managekaryawan_model')->getAllData();
        // $data['email'] = $this->model('Managekaryawan_model')->getAllEmail();

        // echo '<pre>';
        // var_dump($data['kategori']); die();

        $this->view('suratPeringatan', $data);
    }
    public function print($id)
    {
        $data['title'] = 'SURAT PERINGATAN ';
		$data['user'] = $this->user;
        $data['surat'] = $this->model('SuratPeringatan_model')->getDataById($id);
        $data['Managekaryawan'] = $this->model('Managekaryawan_model')->getAllData();

        $this->view('printSuratPeringatan', $data);
    }
    public function tambah()
    {
        if ($this->model('SuratPeringatan_model')->insert($_POST) > 0) {
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
        if ($this->model('SuratPeringatan_model')->hapusDataSurat($id) > 0) {
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