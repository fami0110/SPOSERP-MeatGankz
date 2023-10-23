<?php

class Home extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Home';
		$data['user'] = $this->user;
		$data['jmlSupplier'] = $this->model('Supplier_model')->getJmlData()['count'];
		$data['jmlMenu'] = $this->model('Menu_model')->getJmlData()['count'];

		$this->view('home', $data);
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
