<?php 

class Forbidden extends Controller 
{
  public function index()
  {
    $this->auth('both');

		$data['title'] = 'Forbidden';
		$data['user'] = $this->user;

		$this->view('http/forbidden', $data);
  }
}
