<?php

class User_model
{
	protected $table = 'users';
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAllUser()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->fetchAll();
	}

	public function getUser($username, $password)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username AND `password` = :password");

		$this->db->bind('username', $username);
		$this->db->bind('password', $password);

		return $this->db->fetch();
	}

	public function getUserById($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `id` = :id");
		$this->db->bind('id', $id);
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
			(null, :username, :password, :email, 'User', CURRENT_TIMESTAMP, 0)"
		);

		$this->db->bind('username', $username);
		$this->db->bind('password', hash('sha256', $password));
		$this->db->bind('email', $email);

		$this->db->execute();
	}

	public function password($id, $password)
	{
		$fields_query = "password = :password";

		$this->db->query(
      		"UPDATE {$this->table}
				SET
				{$fields_query}
			WHERE id = :id"
		);

		$this->db->bind('password', hash('sha256', $password));
		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function insert($data)
	{
		$this->db->query(
			"INSERT INTO {$this->table}
				VALUES
			(null, :username, :password, :email, :role, CURRENT_TIMESTAMP, 0)"
		);

		$this->db->bind('username', $data['username']);
		$this->db->bind('password', hash('sha256', $data['password']));
		$this->db->bind('email', $data['email']);
		$this->db->bind('role', $data['role']);

		$this->db->execute();
		return $this->db->rowCount(); 
	}

	public function update($id, $data)
	{
		$this->db->query(
			"UPDATE {$this->table}
				SET
				username = :username,
				email = :email,
				role = :role
			WHERE id = :id"
		);

		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('role', $data['role']);
		$this->db->bind('id', $id);
		
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = :id");

		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->rowCount();
	}
}
