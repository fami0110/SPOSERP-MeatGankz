<?php

class Kasir extends Controller
{
	protected $model_name = 'Pembayaran_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Kasir';
		$data['user'] = $this->user;

        $data['menu'] = $this->model('Menu_model')->getAllData();
        $data['kategori'] = $this->model('Kategori_model')->getAllData();
        $data['pajak'] = $this->model('Preferences')->getPreference('Besar_Pajak_(%)');
		
		$this->view('kasir', $data);
	}

    public function insert()
    {
        $tmp = [];
        foreach ($_POST['item'] as $i => $item) {
            array_push($tmp, [
                'item' => $item,
                'amount' => $_POST['amount'][$i],
                'subtotal' => $_POST['item_subtotal'][$i],
            ]);
        }
        $_POST['detail_pembayaran'] = json_encode($tmp);
        unset($_POST['item']); unset($_POST['amount']); unset($_POST['item_subtotal']);
        
        if ($this->model($this->model_name)->insert($_POST) > 0) {
            Flasher::setFlash('Insert&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Insert&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/kasir');
        exit;
    }

    public function delete($id)
    {
        if ($this->model($this->model_name)->delete($id) > 0) {
            Flasher::setFlash('Delete&nbsp<b>SUCCESS</b>', 'success');
        } else {
            Flasher::setFlash('Delete&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/kasir');
        exit;
    }

	public function update()
	{
        if ($this->model($this->model_name)->update($_POST) > 0) {
            Flasher::setFlash('Update&nbsp<b>SUCCESS</>', 'success');
        } else {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>', 'danger');
        }
        header('Location: ' . BASEURL . '/kasir');
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
