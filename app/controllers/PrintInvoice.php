<?php

class printInvoice extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Print';
		$data['user'] = $this->user;

		$this->view('print-invoice', $data);
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
