<?php

class Logout extends Controller
{
	protected $model_name = 'User_model';

	public function index()
	{
		$this->auth('user');

		if ($this->model($this->model_name)->logout($this->user['id']) > 0) {
			Cookie::delete_jwt();
			Flasher::setFlash('Logout&nbsp<b>SUCCESS</b>', 'success');
		} else {
			Flasher::setFlash('<b>FAILED</b> to logout. Try again later.', 'danger');
		}
		header("Location: " . BASEURL);
		exit;
	}
}
