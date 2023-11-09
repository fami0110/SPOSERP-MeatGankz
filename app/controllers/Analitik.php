<?php

class Analitik extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Laporan Analitik';
		$data['user'] = $this->user;
		$data['jmlSupplier'] = $this->model('Supplier_model')->getJmlData()['count'];
		$data['jmlMenu'] = $this->model('Menu_model')->getJmlData()['count'];
        $data['pendapatan'] = $this->model('Pembayaran_model')->getIncome();

		$this->view('analitik', $data);
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
