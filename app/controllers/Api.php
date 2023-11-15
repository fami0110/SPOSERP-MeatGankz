<?php

class Api extends Controller
{
	private $API_token = "a6dec8374db13fe2c2b263aeb66370ef";

	public function __construct()
    {
        $this->disable_error();
		if ($_GET['token'] == $this->API_token) {
			header('Access-Control-Allow-Origin: *');
			header('Content-Type: application/json');
		} else {
			header('Location: '. BASEURL .'/http/forbidden');
			exit;
		}
	}

	public function index()
	{
		header('Location: '. BASEURL .'/http/forbidden');
		exit;
	}

	public function test()
	{
    // example link : "http://sposerp-meatgankz.test/api/test&token=a6dec8374db13fe2c2b263aeb66370ef"
    echo json_encode(['success' => true]);
	}
}
