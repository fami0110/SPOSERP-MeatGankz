<?php

use Ramsey\Uuid\Uuid;

class Stok_model
{
	protected $table = "stok";
	protected $fields = [
        'nama',
        'stok',
        'satuan',
        'riwayat',
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
		$fields_query = ":nama, :stok, :satuan, :riwayat,";

		$this->db->query(
            "INSERT INTO {$this->table} 
				VALUES
            (null, :uuid, {$fields_query} '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
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
            nama = :nama,
            satuan = :satuan,
            stok = :stok,
            riwayat = :riwayat,
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

	public function updateStok($id, $tanggal, $value = ['masuk' => 0, 'keluar' => 0])
	{
		$data = $this->getDataById($id);
		$riwayat = json_decode($data['riwayat'], true);

		if (isset($value['masuk'])) $riwayat[$tanggal]['masuk'] = $value['masuk'];
		if (isset($value['keluar'])) $riwayat[$tanggal]['keluar'] = $value['keluar'];

		if (!isset($riwayat[$tanggal]['masuk'])) $riwayat[$tanggal]['masuk'] = 0;
		if (!isset($riwayat[$tanggal]['keluar'])) $riwayat[$tanggal]['keluar'] = 0;

		$stok = 0;
		foreach ($riwayat as $i) {
			$stok += $i['masuk'] - $i['keluar'];
		}

		$riwayat[$tanggal]['stok'] = $stok;

		$this->db->query(
			"UPDATE {$this->table}
				SET 
				stok = :stok,
				riwayat = :riwayat,
				modified_at = CURRENT_TIMESTAMP,
				modified_by = :modified_by
			WHERE id = :id"
		);

		$this->db->bind('stok', $stok);
		$this->db->bind('riwayat', json_encode($riwayat));
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

	public function uploadFile($file, $type = [], $targetDir = 'upload/', $maxSize = 2*MB, $oldFileName = '')
    {
		if ($file['error'] !== 4) {
			if (!empty($oldFileName)) 
				$this->deleteFile($targetDir . '/' . $oldFileName);

			$name = $file['name'];

			if ($file["size"] > $maxSize)
				return false;
			
			$imageFileType = explode('.', $name);
			$imageFileType = strtolower(end($imageFileType));
			if (!in_array($imageFileType, $type))
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
