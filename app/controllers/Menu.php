<?php

class Menu extends Controller
{
	protected $model_name = 'Menu_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Menu';
		$data['user'] = $this->user;
        $data['menu'] = $this->model($this->model_name)->getAllData();
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
        $data['barang'] = $this->model('Stok_model')->getAllData();
        $this->model($this->model_name)->countAvailableAll();
		
		$this->view('menu/index', $data);
	}

    public function insert()
    {
        foreach ($_POST['nama_bahan'] as $i => $nama_bahan) {
            $bahan[$nama_bahan] = floatval($_POST['jumlah_bahan'][$i]);
        }
        $_POST['bahan'] = json_encode($bahan);
        unset($_POST['nama_bahan']); unset($_POST['jumlah_bahan']);

        try {
            $this->model($this->model_name)->insert($_POST);
            $this->model($this->model_name)->countAvailable();
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');   
        } catch (Exception) {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }

        header('Location: ' . BASEURL . '/menu');
        exit;
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/menu');
        exit;
    }

	public function update($id)
	{
        foreach ($_POST['nama_bahan'] as $i => $nama_bahan) {
            $bahan[$nama_bahan] = floatval($_POST['jumlah_bahan'][$i]);
        }
        $_POST['bahan'] = json_encode($bahan);
        unset($_POST['nama_bahan']); unset($_POST['jumlah_bahan']);

        try {
            $this->model($this->model_name)->update($id, $_POST);
            $this->model($this->model_name)->countAvailable($id);
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');   
        } catch (Exception) {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }

        header('Location: ' . BASEURL . '/menu');
        exit;
	}

	public function updateStatusMenu($id, $status)
	{
        if ($this->model($this->model_name)->updateField($id, 'tersedia', $status) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
	}

    public function getUbah($id)
    {
        echo json_encode($this->model($this->model_name)->getDataById($id));
    }

	public function destroy()
	{
	}
    
}
