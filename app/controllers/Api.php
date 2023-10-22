<?php

class Api extends Controller
{
	public function index()
	{
		return "Anda tidak memiliki akses";
	}

	public function getQuestions($game_id = '', $user_id = '')
	{
		// echo "test";
		$this->disable_error();
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');

		$response = $this->model("Question", 'Question_model')->getCardQuestions($game_id, $user_id);

		$success = ($response) ? true : false;
		echo json_encode(['success' => $success, 'data' => $response]);
	}

	public function dropQuestion($id)
	{
		// echo "test";
		$this->disable_error();
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		if ($this->model("Question", 'Question_model')->hapusData($id) > 0) {
			echo json_encode(['success' => true, 'message' => "Data berhasil dihapus!"]);
		} else {
			echo json_encode(['success' => false, 'message' => "Data berhasil dihapus!"]);
		}
	}

	public function getCards($id = null)
	{
		// echo "test";
		$this->disable_error();
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		($id == null) ?
			$data = $this->model("Cards", 'Card_model')->getAllCard() :
			$data = $this->model("Cards", 'Card_model')->getCardById($id);
		foreach ($data as $item) {
			$response[] = $item;
		}
		($data) ?
			$success = true :
			$success = false;
		echo json_encode(['success' => $success, 'data' => $response]);
	}

	public function addQuestion()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		if ($_POST) {
			if ($this->model("Question", "Question_model")->tambahData($_POST) > 0) {
				echo json_encode(["success" => true, "message" => "Data Question berhasil ditambahkan"]);
			} else {
				echo json_encode(["success" => false, "message" => "Data Question gagal dihapus"]);
			}
		} else {
			echo json_encode(["success" => false, "message" => "Data POST Tidak Terkirim!"]);
		}
	}

	public function getAllGames()
	{
		// echo "test";
		$this->disable_error();
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');

		$response = $this->model("Games", 'Game_model')->getAllExistData();

		$success = ($response) ? true : false;
		echo json_encode(['success' => $success, 'data' => $response]);
	}
}
