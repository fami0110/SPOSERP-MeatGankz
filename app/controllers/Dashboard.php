<?php

class Dashboard extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Dashboard';
		$data['user'] = $this->user;

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
