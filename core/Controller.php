<?php

class Controller
{
    protected $user;

    public function __construct()
    {
        // Get user credential using jwt cookie
        $jwt = Cookie::get_jwt();
        if ($jwt) {
            try {
                $user = $this->model("User_model")->getUser($jwt->name, $jwt->password);
                $this->user = ($user) ? $user : null;
            } catch (Exception) {
                $this->user = null;
            }
        }
    }

    public function auth($status = 'both', $role = false)
    {
        switch ($status) {
            case 'user':
                if (!$this->user) {
                    header('Location: '. BASEURL .'/login');
                    exit;
                } elseif ($role && $role != $this->user['role']) {
                    header('Location: '. BASEURL .'/http/forbidden');
                    exit;
                }
                break;
            case 'guest':
                if ($this->user) {
                    header('Location: '. BASEURL .'/dashboard');
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
}
