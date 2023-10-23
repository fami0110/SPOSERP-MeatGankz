<?php

class NotFound extends Controller
{
  public function index()
  {
    $this->auth('both');

		$data['title'] = 'Home';
		$data['user'] = $this->user;

		$this->view('notfound', $data);
  }
}
