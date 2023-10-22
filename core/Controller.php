<?php

class Controller
{
    protected $user;

    public function __construct()
    {
        // Error Reporting
        if (ENV == 'Production') $this->disable_error();

        // Get user credential using jwt cookie
        $jwt = Cookie::get_jwt();
        if ($jwt) {
            $user = $this->model("User_model")->getUser($jwt->name, $jwt->password);
            $this->user = ($user) ? $user : null;
        }
    }

    public function auth($status = 'both')
    {
        switch ($status) {
            case 'user':
                if (!$this->user) {
                    header('Location: '. BASEURL .'/login');
                    exit;
                }
                break;
            case 'guest':
                if ($this->user) {
                    header('Location: '. BASEURL .'/home');
                    exit;
                }
                break;
        }
    }

    public function view($view, $data = [])
    {
        require_once "../app/views/{$view}.php";
    }

    public function model($model)
    {
        require_once "../app/models/{$model}.php";
        return new $model;
    }

    public function disable_error() {
        error_reporting(0);
        error_reporting(E_ERROR | E_PARSE);
        ini_set('display_errors', 0);
    }
}
