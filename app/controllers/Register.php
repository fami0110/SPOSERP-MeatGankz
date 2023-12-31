<?php 

class Register extends Controller
{
  public function index()
  {
		$this->auth('guest');
		
		$data['title'] = 'Sign Up';

		$this->view('auth/register', $data);
  }

  public function process()
  {
		try {
			$this->model("User_model")->register($_POST["username"], $_POST["password"], $_POST["email"]);
			Flasher::setFlash('Register&nbsp<b>SUCCESS</b>!', 'success');
			header("Location: " . BASEURL . "/login");
		} catch (Exception $e) {
			Flasher::setFlash('Register&nbsp<b>FAILED</b>!', 'danger');
			header("Location: " . BASEURL . "/register");
		}
		exit;
  }
}
