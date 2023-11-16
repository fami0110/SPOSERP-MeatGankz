<?php 

class Profile extends Controller
{
	protected $model_name = 'User_model';

	public function index()
	{
		$this->auth('user');

		$data['title'] = 'Profile';
		$data['user'] = $this->user;

		$this->view('auth/profile', $data);
	}

	public function changePassword()
	{
		$id = $_POST['id']; 
        $data = $_POST['password']; 

		try {
			$this->model("User_model")->password($id, $data) > 0;
			Flasher::setFlash('Change Password &nbsp<b>SUCCESS</b>!', 'success');
			header("Location: " . BASEURL . "/profile");
		} catch (Exception $e) {
			Flasher::setFlash('Change Password &nbsp<b>FAILED</b>!', 'danger');
			header("Location: " . BASEURL . "/profile");
		}
		exit;
	}
}

?>