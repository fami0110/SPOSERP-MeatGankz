<?php

class Home extends Controller
{
	protected $model = '';

	public function index()
	{
		$this->auth('both');

		$data['title'] = 'Perpustakaan - Home';
		$data['user'] = $this->user;

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
