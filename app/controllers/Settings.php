<?php

class Settings extends Controller
{
	protected $model_name = 'Preferences';

	public function index()
	{
        $this->auth('user', 'Superadmin');

        $data['title'] = 'Setting';
        $data['user'] = $this->user;
        
        $data['preferences'] = $this->model($this->model_name)->getAllPreference();
        $data['categories'] = $this->model($this->model_name)->getALlCategories();
        
        $this->view('admin/settings', $data);
    }

    public function update()
    {
        try {
            foreach ($_POST as $key => $value)
                $this->model($this->model_name)->updatePreference($key, $value);
                
            Flasher::setFlash('Update&nbsp<b>SUCCESS</b>!', 'success');
        } catch (Exception $e) {
            Flasher::setFlash('Update&nbsp<b>FAILED</b>!', 'danger');
        }
        header('Location: ' . BASEURL . '/settings');
        exit;
    }
}