<?php

class User_model
{
	protected $table = 'users';
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getUser($username, $password)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username AND `password` = :password");

		$this->db->bind('username', $username);
		$this->db->bind('password', $password);

		return $this->db->fetch();
	}

	public function login($id)
	{
		$this->db->query("UPDATE {$this->table} SET `last_login_at` = CURRENT_TIMESTAMP, `status` = 1 WHERE id = :id");

		$this->db->bind("id", $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function logout($id)
	{
		$this->db->query("UPDATE {$this->table} SET `status` = 0 WHERE id = :id");

		$this->db->bind("id", $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function register($username, $password, $email)
	{
		$this->db->query(
			"INSERT INTO {$this->table}
				VALUES
			(null, :username, :password, :email, 'user', CURRENT_TIMESTAMP, 1)"
		);

		$this->db->bind('username', $username);
		$this->db->bind('password', hash('sha256', $password));
		$this->db->bind('email', $email);
		$this->db->execute();

		$this->db->rowCount(); 
	}
}
