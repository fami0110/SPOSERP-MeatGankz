<?php

class Migrate extends Controller
{
	protected $model_name = "Databases";
	protected $folderPath = '../app/database'; // Relative to root folder (public)

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

			$data['tables'] = $this->model($this->model_name)->getAllTables();
			array_unshift($data['tables'], [
				'TABLE_NAME' => 'database', 
				"TABLE_ROWS" => count($data['tables'])
			]);

			$this->view('templates/_migrate', $data);

		} else {
			header('Location: '. BASEURL .'/NotFound');
			exit;
		}
	}

	public function export($filename)
	{
		try {
			$sqlFilePath = "{$this->folderPath}/{$filename}";
			$sqlQueries = explode(';', file_get_contents($sqlFilePath));

			if ($filename == 'database.sql') {
				$tables = $this->model($this->model_name)->getAllTables();
				foreach ($tables as $table) $this->model($this->model_name)->drop($table['TABLE_NAME']);
				$this->model($this->model_name)->import($sqlQueries);

				Flasher::setFlash('<b>SUCCESS</b> to migrate all table', 'success');
			} else {
				$table = explode('.', $filename)[0];
				$this->model($this->model_name)->drop($table);
				$this->model($this->model_name)->import($sqlQueries);
				
				Flasher::setFlash("<b>SUCCESS</b> to migrate table <i>". $table ."</i>", 'success');
			}
		} catch (Exception $e) {
			Flasher::setFlash("Migration &nbsp<b>FAILED</b>! message: <pre>$e</pre>", 'danger');
		}
		header('Location: '. BASEURL .'/migrate');
		exit;
	}

	public function import($target)
	{
		try {
			$mysqldump = explode('www', $_SERVER['DOCUMENT_ROOT'], 2)[0] . "bin/mysql/mysql-8.0.30-winx64/bin/mysqldump";
			$sqlFilePath = "{$this->folderPath}/{$target}";

			$command = ($target == 'database') ? 
				"\"{$mysqldump}\" --host=". DB_HOST ." --user=". DB_USER ." ". DB_NAME ." > {$sqlFilePath}.sql" :
				"\"{$mysqldump}\" --host=". DB_HOST ." --user=". DB_USER ." ". DB_NAME ." ". $target ." > {$sqlFilePath}.sql";

			exec($command, $output, $returnVar);

			if ($returnVar === 0) {
				($target == 'database') ? 
					Flasher::setFlash("<b>SUCCESS</b> to import all tables", 'success') :
					Flasher::setFlash("<b>SUCCESS</b> to import table <i>". $target ."</i>", 'success');
			} else {
				throw new Exception("Error creating database backup. mess");
			}
		} catch (Exception $e) {
			Flasher::setFlash("Import <b>FAILED</b>! message: <pre>$e</pre>", 'danger');
		}
		header('Location: '. BASEURL .'/migrate');
		exit;
	}
}
