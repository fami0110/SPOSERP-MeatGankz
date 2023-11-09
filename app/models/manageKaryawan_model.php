<?php

use Ramsey\Uuid\Uuid;

class Managekaryawan_model
{
    protected $table = "manage_karyawan";
    protected $fields = [
        'nik',
        'nama',
        'tempat_lahir',
		'tgllahir',
        'jenis_kelamin',
        'alamat',
        'email',
        'no_telp',
        'jabatan',
        'statuss',
        'gaji'
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
        try {
            $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1");
            return $this->db->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

	public function getDataById($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1 AND `id` = :id");
		$this->db->bind('id', $id);
		return $this->db->fetch();
	}

    public function insert($data)
    {
        $fields_query = ":nik, :nama, :tempat_lahir, :tgllahir, :jenis_kelamin, :alamat, :email, :no_telp, :foto, :jabatan, :statuss, :gaji";

		$this->db->query(
			"INSERT INTO {$this->table} 
			    VALUES
			(null, :uuid, {$fields_query}, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, 1)"
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
			nik = :nik,
			nama = :nama,
			tempat_lahir = :tempat_lahir,
			tgllahir = :tgllahir,
            jenis_kelamin = :jenis_kelamin,
			alamat = :alamat,
			email = :email,
			no_telp = :no_telp,
			foto = :foto,
            jabatan = :jabatan,
			statuss = :statuss,
            gaji = :gaji,
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