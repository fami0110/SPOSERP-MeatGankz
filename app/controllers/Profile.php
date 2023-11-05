<?php 

class Profile extends Controller
{
	protected $model_name = 'User_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Perpustakaan - Profile';
		$data['user'] = $this->user;

		$this->view('auth/profile', $data);
	}
}

?>