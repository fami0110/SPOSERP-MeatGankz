<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class LaporanPenjualan extends Controller
{
	protected $model = 'laporanPenjualan_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Laporan Penjualan Harian';
		$data['user'] = $this->user;
        // $data['menu'] = $this->model('laporanPenjualan_model')->getAllData();
        // $data['tanggal'] = $this->model('laporanPenjualan_model')->getTanggal();
        // $data['keluar'] = $this->model('Pembayaran_model')->getAllData();

		
		$this->view('laporanPenjualan', $data);
	}

    public function insert()
    {
        if ($this->model('laporanPenjualan_model')->insert($_POST) > 0) {
            Flasher::setFlash('Insert <b>SUCCESS</b>', 'success');
			header("Location: " . BASEURL . "/laporanPenjualan");
            exit;
        } else {
            Flasher::setFlash('Insert <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/laporanPenjualan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('laporanPenjualan_model')->delete($id) > 0) {
            Flasher::setFlash('Delete <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/laporanPenjualan');
            exit;
        } else {
            Flasher::setFlash('Delete <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/laporanPenjualan');
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

        if ($this->model('laporanPenjualan_model')->update($id, $data) > 0) {
            Flasher::setFlash('Update <b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/laporanPenjualan');
            exit;
        } else {
            Flasher::setFlash('Update <b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/laporanPenjualan');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('laporanPenjualan_model')->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
