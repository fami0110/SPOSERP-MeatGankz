<?php

use Ramsey\Uuid\Uuid;

class Kategori_model
{
	protected $table = "kategori";
	protected $fields = [
        'nama'
    ];
	protected $user;
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->user = Cookie::get_jwt()->name;
	}

	public function getAllData()
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1");
	return $this->db->fetchAll();
	}

	public function getDataById($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1 AND `id` = :id");
		$this->db->bind('id', $id);
		return $this->db->fetch();
	}

	public function insert($data)
	{
		$fields_query = ":nama";

		$this->db->query(
			"INSERT INTO {$this->table} 
				VALUES
      		(null, :uuid, {$fields_query}, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
		);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('uuid', Uuid::uuid4()->toString());
		$this->db->bind('created_by', $this->user);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function update($id, $data)
	{
		$fields_query = "
            nama= :nama,
        ";

		$this->db->query(
			"UPDATE {$this->table}
				SET
					{$fields_query}
					modified_at = CURRENT_TIMESTAMP,
					modified_by = :modified_by
			WHERE id = :id"
		);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('id', $id);
		$this->db->bind('modified_by', $this->user);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateField($id, $field, $value)
	{
		$this->db->query(
			"UPDATE {$this->table}
				SET 
				{$field} = :val,
				modified_at = CURRENT_TIMESTAMP,
				modified_by = :modified_by
			WHERE id = :id"
		);

		$this->db->bind('val', $value);
		$this->db->bind('id', $id);
		$this->db->bind('modified_by', $this->user);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function delete($id)
	{
		$this->db->query(
			"UPDATE {$this->table}  
				SET 
				`deleted_at` = CURRENT_TIMESTAMP,
				`deleted_by` = :deleted_by,
				`is_deleted` = 1,
				`is_restored` = 0,
				`status` = DEFAULT
			WHERE id = :id"
		);

		$this->db->bind('deleted_by', $this->user);
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
