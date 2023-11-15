<?php


use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class Menu_model
{
	protected $table = "menu";
	protected $fields = [
		'nama',
		'kategori_id',
		'harga',
		'tersedia'
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
	public function getBest()
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1 LIMIT 5");
		return $this->db->fetchAll();
	}

	public function getJmlData()
	{
			$this->db->query("SELECT COUNT(*) AS count FROM {$this->table} WHERE `status` = 1");
			return $this->db->fetch();
	}

	public function getLatestData()
	{
		$this->db->query("SELECT * FROM {$this->table} ORDER BY `created_at` DESC LIMIT 1");
		return $this->db->fetch();
	}

	public function getDataById($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1 AND `id` = :id");
		$this->db->bind('id', $id);
		return $this->db->fetch();
	}

	public function insert($data)
	{
		$fields_query = ":nama, :kategori_id, :harga, :tersedia, :foto,";

		$this->db->query(
			"INSERT INTO {$this->table} 
				VALUES
			(null, :uuid, {$fields_query} '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, 1)"
		);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('foto', 
			$this->uploadFile($_FILES['foto'], 'png|jpg|jpeg|gif', 'img/datafoto/', 2*MB));

		$this->db->bind('uuid', Uuid::uuid4()->toString());
		$this->db->bind('created_by', $this->user);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function update($id, $data)
	{
		$fields_query = "
			nama = :nama,
			kategori_id = :kategori_id,
			harga = :harga,
			tersedia = :tersedia,
			foto = :foto,
		";

		$old = $this->getDataById($id);

		$this->db->query(
			"UPDATE {$this->table}
				SET
				{$fields_query}
				modified_at = CURRENT_TIMESTAMP,
				modified_by = :modified_by
			WHERE id = :id"
		);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('foto', $this->uploadFile($_FILES["foto"], "png|jpg|jpeg|gif", 'img/datafoto/', 2*MB, $old['foto']));

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

	public function uploadFile($file, $mimes = '', $targetDir = 'upload/', $maxSize = 2*MB, $oldFileName = '')
    {
		if ($file['error'] !== 4) {
			if (!empty($oldFileName)) 
				$this->deleteFile($targetDir . '/' . $oldFileName);

			$name = $file['name'];

			if ($file["size"] > $maxSize)
				return false;
			
			$imageFileType = explode('.', $name);
			$imageFileType = strtolower(end($imageFileType));
			if (!in_array($imageFileType, explode('|', $mimes)))
				return false;

			$fileName = uniqid() . "." . $imageFileType;
			$targetDir .= $fileName;

			try {
				move_uploaded_file($file['tmp_name'], $targetDir);
			} catch (Exception $e) {
				echo $e; die;
			}

			return $fileName;
		} else {
			return empty($oldFileName) ? false : $oldFileName;
		}
    }

    public function deleteFile($filepath)
    {
        if (file_exists($filepath)) 
			unlink($filepath);
    }
}
