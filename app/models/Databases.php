<?php

class Databases
{
	protected $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getAllTables()
	{
		$this->db->query(
			"SELECT table_name FROM information_schema.tables 
				WHERE 
			table_schema = :db_name AND
			table_type = 'BASE TABLE'"
		);

		$this->db->bind('db_name', DB_NAME);
		return $this->db->fetchAll(PDO::FETCH_COLUMN);
	}

	public function drop($table_name)
	{
		$this->db->query("DROP TABLE IF EXISTS {$table_name}");

		$this->db->execute();
		$this->db->rowCount();
	}

	public function import($queries)
	{
		foreach ($queries as $query) {
			$query = trim($query);
			if (empty($query)) continue;

			$this->db->query($query);
			$this->db->execute();
		}
	}
}
