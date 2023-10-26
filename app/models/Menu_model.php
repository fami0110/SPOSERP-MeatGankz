<?php


use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class Menu_model
{
	protected $table = "menu";
	protected $fields = [
		'nama',
		'kategori',
		'harga',
		'jumlah',
		'tanggal',
		'bahan'
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

	public function getJmlData()
	{
		$this->db->query("SELECT COUNT(*) AS count FROM {$this->table} WHERE `status` = 1");
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
		// $fields_query = ":nama, :foto, :jumlah, :bahan,";

		$this->db->query(
			"INSERT INTO {$this->table} 
				VALUES
			(null, :uuid, :nama, :kategori, :harga, :foto, :jumlah, :tanggal, :bahan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, 1)"
		);

		$foto = $this->uploadFile($_FILES['foto'], ['png', 'jpg', 'jpeg', 'gif'], 'img/datafoto/');
		// if (!$foto) return 0;

		$this->db->bind('foto', $foto);
		$this->db->bind('uuid', Uuid::uuid4()->toString());
		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('created_by', $this->user);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function update($id, $data)
	{
		// $fields_query = "
		// 	nama = :nama,
		// 	jumlah = :jumlah,
		// 	bahan = :bahan,
		// ";

		$this->db->query(
			"UPDATE {$this->table}
			SET
			nama = :nama,
			harga = :harga,
			foto = :foto,
			jumlah = :jumlah,
			bahan = :bahan,
			modified_at = CURRENT_TIMESTAMP,
			modified_by = :modified_by
			WHERE id = :id"
		);
		
		if ($_FILES["foto"]["error"] === 4) {
			$foto = $data['fotolama'];
		} else {
			if (!empty($data['fotolama'])) {
				$this->deleteFile('img/datafoto/' . $data['foto_lama']);
			}
			
			$foto = $this->uploadFile($_FILES["foto"], ['png', 'jpg', 'jpeg', 'gif'], 'img/datafoto/');
		}
		$this->db->bind('foto', $foto);
		
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
	public function uploadFile($file, $type = [], $targetDir = '/')
    {
        $name = $file['name'];
        
        // validasi ekstensi file
        $imageFileType = explode('.', $name);
        $imageFileType = strtolower(end($imageFileType));
        if (!in_array($imageFileType, $type)) {
            return false;
        }

        // validasi ukuran file
        if ($_FILES["size"] > 20044070) {
            return false;
        }

        $fileName = uniqid() . "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        try {
            move_uploaded_file($file['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

	public function deleteFile($filepath)
    {
        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                return true;
            } 
        }

        return false;
	}
}