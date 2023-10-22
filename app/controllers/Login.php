<?php

class Login extends Controller
{
	protected $model_name = "User_model";

	public function index()
	{
		$this->auth('guest');

		$data['title'] = 'Login';

		$this->view('login', $data);
	}

	public function process()
	{
		$this->auth('guest');

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$user = $this->model($this->model_name)->getUser($_POST['username'], hash('sha256', $_POST['password']));

			if ($user) {
				if ($this->model($this->model_name)->login($user['id']) > 0) {
					$payload = [
						'sub' => $user['id'],
						'name' => $user['username'],
						'password' => $user['password'],
						'exp' =>  time() + (7 * 24 * 60 * 60) // Token expired after 1 day
					];

					Cookie::create_jwt($payload, $payload['exp']);

					Flasher::setFlash('Login <b>SUCCESS</b>', 'success');
					header("Location: " . BASEURL . "/home");
				}
			} else {
				Flasher::setFlash('Login <b>FAILED</b>', 'danger');
				header("Location: " . BASEURL . "/login");
			}
		} else {
			Flasher::setFlash('Login <b>FAILED</b>!', 'danger');
			header("Location: " . BASEURL . "/login");
		}

		exit;
	}
}
