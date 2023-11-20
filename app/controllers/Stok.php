<?php

class Stok extends Controller
{
	protected $model_name = 'Stok_model';

    public function index()
	{
		$this->auth('user');

		$data['title'] = 'Daftar Barang';
		$data['user'] = $this->user;

        $data['barang'] = $this->model($this->model_name)->getAllData();
		
		$this->view('stok/index', $data);
	}

	public function rekap()
	{
		$this->auth('user');

		$data['title'] = 'Rekap Stok';
		$data['user'] = $this->user;

        $data['barang'] = $this->model($this->model_name)->getAllData();
        $data['filter'] = (isset($_POST['filter'])) ?
            ['from' => $_POST['filter'][0], 'to' => $_POST['filter'][1]] :
            ['from' => date('Y-m-d'), 'to' => date('Y-m-d')];
		
		$this->view('stok/rekap', $data);
	}

    public function pengeluaran()
    {
        $this->auth('user');

        $data['title'] = 'Pengeluaran';
		$data['user'] = $this->user;
        
        $data['barang'] = $this->model($this->model_name)->getAllData();
        $data['pengeluaran'] = [];
        foreach ($data['barang'] as $barang) {
            $tmp = json_decode($barang['riwayat'], true);
            array_push($data['pengeluaran'], isset($tmp[date('Y-m-d')]) ? 
                $tmp[date('Y-m-d')]['keluar'] : 0
            );
        }
		
		$this->view('stok/pengeluaran', $data);
    }

    public function insert()
    {
        $tmp[date('Y-m-d')] = [
            'masuk' => 0,
            'stok' => $_POST['stok'],
            'keluar' => 0,
        ];
        $_POST['riwayat'] = json_encode($tmp);

        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/stok');
        exit;
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/stok');
        exit;
    }

	public function update()
    {
        if ($this->model($this->model_name)->update($_POST['id'], $_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/stok');
        exit;
    }

    public function updatePengeluaran()
    {
        try {
            $data = array_combine($_POST['id'], $_POST['pengeluaran']);

            foreach ($data as $id => $val) {
                if (!$this->model($this->model_name)->updateStok($id, date('Y-m-d'), ['keluar' => $val])) {
                    throw new Exception("Haha error");
                }
            }

            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>', 'success');
        } catch (Exception) {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/stok/pengeluaran');
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model($this->model_name)->getDataById($_POST['id']));
    }

	public function destroy()
	{
	}
}
