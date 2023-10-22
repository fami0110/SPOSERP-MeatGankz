<?php

class Migrate extends Controller
{
	protected $model_name = "Databases";
	protected $folderPath = '../app/database'; // Relative to public folder

	public function index()
	{
		if (ENV == 'Local') {
			$data['files'] = [];

			$files = scandir($this->folderPath);
			if ($files) {
				unset($files[0]);
				unset($files[1]);

				$data['files'] = array_values($files);
			}

			$this->view('templates/_migrate', $data);

		} else {
			header('Location: '. BASEURL .'/NotFound');
			exit;
		}
	}

	public function process($filename)
	{
		try {
			$sqlFilePath = "{$this->folderPath}/{$filename}";
			$sqlQueries = explode(';', file_get_contents($sqlFilePath));

			if ($filename == 'database.sql') {
				$tables = $this->model($this->model_name)->getAllTables();
				foreach ($tables as $table) $this->model($this->model_name)->drop($table);
				$this->model($this->model_name)->import($sqlQueries);

				Flasher::setFlash('<b>SUCCESS</b> to migrate all table', 'success');
			} else {
				$table = explode('.', $filename)[0];
				$this->model($this->model_name)->drop($table);
				$this->model($this->model_name)->import($sqlQueries);
				
				Flasher::setFlash("<b>SUCCESS</b> to migrate table <i>{$table}</i>", 'success');
			}

			header('Location: '. BASEURL .'/migrate');
			exit;
		} catch (Exception $e) {
			Flasher::setFlash("Migration <b>FAILED</b>! message: <pre>$e</pre>", 'danger');
			header('Location: '. BASEURL .'/migrate');
			exit;
		}
	}
}
