<?php

use Ramsey\Uuid\Uuid;

class Shipment_model
{
	protected $table = "shipment";
	protected $table_stok = "stok_bahan";
	protected $fields = [
        'stok_id',
		'supplier_id',
        'harga_all_in',
        'deskripsi',
        'pesan',
        'berat',
        'harga_exw',
        'total_exw',
        'biaya_lainnya',
        'total_biaya_lainnya',
        'diskon',
        'total',
		'tanggal',
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

	public function getPemasukanAt($tanggal, $stok_id)
	{
		$this->db->query(
			"SELECT SUM(`pesan`) AS 'sum' FROM {$this->table}
				WHERE 
				`tanggal` = :tanggal AND
				`stok_id` = :stok_id AND
				`status` = 1
			GROUP BY `tanggal`"
		);

		$this->db->bind('tanggal', $tanggal);
		$this->db->bind('stok_id', $stok_id);

		return $this->db->fetch(PDO::FETCH_COLUMN);
	}

	public function insert($data)
	{
		$fields_query = "
			:stok_id,
			:supplier_id,
			:harga_all_in,
			:deskripsi,
			:pesan,
			:berat,
			:harga_exw,
			:total_exw,
			:biaya_lainnya,
			:total_biaya_lainnya,
			:diskon,
			:total,
			:tanggal,
		";

		$this->db->query(
			"INSERT INTO {$this->table} 
				VALUES
			(null, :uuid, {$fields_query} '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
		);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('uuid', Uuid::uuid4()->toString());
		$this->db->bind('created_by', $this->user);

		$this->db->execute();

		// Update stok
		$pemasukan = $this->getPemasukanAt($data['tanggal'], $data['stok_id']);
		return Get::model('Stok_model')
			->updateStok($data['stok_id'], $data['tanggal'], ['masuk' => intval($pemasukan)]);
	}

	public function update($id, $data)
	{
		$fields_query = "
			stok_id = :stok_id,
			supplier_id = :supplier_id,
			harga_all_in = :harga_all_in,
			deskripsi = :deskripsi,
			pesan = :pesan,
			berat = :berat,
			harga_exw = :harga_exw,
			total_exw = :total_exw,
			biaya_lainnya = :biaya_lainnya,
			total_biaya_lainnya = :total_biaya_lainnya,
			diskon = :diskon,
			total = :total,
			tanggal = :tanggal,
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
		$this->db->bind('modified_by', $this->user);
		$this->db->bind('id', $id);

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
		$this->db->bind('modified_by', $this->user);
		$this->db->bind('id', $id);

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
				`is_deleted` = 1
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
