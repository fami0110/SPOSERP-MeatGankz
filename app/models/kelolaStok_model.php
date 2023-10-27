<?php

use Ramsey\Uuid\Uuid;

class kelolaStok_model
{
	protected $table = "stok_bahan";
	protected $fields = [
        'deskripsi',
        'tanggal',
        'masuk',
        'stok',
        'keluar'
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

	public function getTanggal()
    {
        $this->db->query("SELECT tanggal from {$this->table} WHERE `status` = 1");
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
		$fields_query = ":deskripsi, :tanggal, :masuk, :stok, :keluar";

		$this->db->query(
            "INSERT INTO {$this->table} 
				VALUES
            (null, :uuid, {$fields_query}, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
	}

	public function update($id, $data)
	{
		$fields_query = "
            deskripsi = :deskripsi,
            tanggal = :tanggal,
            masuk = :masuk,
            stok = :stok,
            keluar = :keluar,
        ";

		$this->db->query(
            "UPDATE {$this->table}
				SET
                {$fields_query}
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

		foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
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
                `status` = 0
            WHERE id = :id"
        );

		$this->db->bind('deleted_by', $this->user);
		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE");
		
		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->rowCount();
	}
}
