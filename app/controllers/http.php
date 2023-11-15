<?php

class Http extends Controller
{
    public function index()
    {
        header('Location: '. BASEURL .'/http/notfound');
        exit;
    }
    
    public function notfound()
    {
        $this->auth('both');

        $data['title'] = 'NotFound';
        $data['user'] = $this->user;

        $this->view('http/notfound', $data);
    }

    public function forbidden()
    {
        $this->auth('both');

        $data['title'] = 'Forbidden';
        $data['user'] = $this->user;

        $this->view('http/forbidden', $data);
    }
}
