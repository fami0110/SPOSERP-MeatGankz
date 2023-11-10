<?php

class Dashboard extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Dashboard';
		$data['user'] = $this->user;
		$data['jmlSupplier'] = $this->model('Supplier_model')->getJmlData()['count'];
		$data['jmlMenu'] = $this->model('Menu_model')->getJmlData()['count'];
		$data['pendapatan'] = $this->model('Pembayaran_model')->getIncome();
        $data['menu'] = $this->model('Menu_model')->getBest();
        // $data['kategori'] = $this->model('Kategori_model')->getAllData();

		$this->view('dashboard', $data);
	}

	public function store()
	{
	}

	public function update()
	{
	}

	public function destroy()
	{
	}
}
