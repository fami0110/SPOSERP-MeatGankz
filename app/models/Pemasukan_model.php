<?php

use Ramsey\Uuid\Uuid;

class Pemasukan_model
{
	protected $table = "shipment";
	protected $table_stok = "stok_bahan";
	protected $fields = [
        'harga',
        'unit_harga',
        'barang_id',
        'pesan',
        'unit_pesan',
        'berat',
        'unit_berat',
        'harga_exw',
        'total_exw',
        'ongkir',
        'ice_pack',
        'diskon',
        'total',
        'supplier_id',
		'tanggal'
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

	public function getbarang_id()
    {
        $this->db->query("SELECT barang_id from {$this->table} WHERE `status` = 1");
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
		$fields_query = ":harga, :unit_harga, :barang_id, :pesan, :unit_pesan, :berat, :unit_berat, :harga_exw, :total_exw, :ongkir, :ice_pack, :diskon, :total, :supplier_id, :tanggal";

		$uuid = Uuid::uuid4()->toString();
		$currentTimestamp = date("Y-m-d H:i:s");
		$createdBy = $this->user;

		$query1 = "INSERT INTO {$this->table} VALUES (null, :uuid, {$fields_query}, '', :currentTimestamp, :createdBy, null, '', null, '', null, '', 0, 0, DEFAULT)";
		$query2 = "INSERT INTO {$this->table_stok} VALUES (null, :uuid, :barang_id, :tanggal, :pesan, null, null, '', :currentTimestamp, :createdBy, null, '', null, '', null, '', 0, 0, DEFAULT)";

		$this->db->query($query1);
		$this->db->query($query2);

		foreach ($this->fields as $field) $this->db->bind($field, $data[$field]);
		$this->db->bind('barang_id', $data['barang_id']);
		$this->db->bind('tanggal', $data['tanggal']);
		$this->db->bind('pesan', $data['pesan']);
		// $this->db->bind('stok', $data['stok']);
		// $this->db->bind('keluar', $data['keluar']);
		$this->db->bind('uuid', $uuid);
		$this->db->bind('createdBy', $createdBy);
		$this->db->bind('currentTimestamp', $currentTimestamp);

		$this->db->execute();

		return $this->db->rowCount();
	}


	public function update($id, $data)
	{
		$fields_query = "
            harga = :harga,
            unit_harga = :unit_harga,
            barang_id = :barang_id,
            pesan = :pesan,
            unit_pesan = :unit_pesan,
            berat = :berat,
            unit_berat = :unit_berat,
            harga_exw = :harga_exw,
            total_exw = :total_exw,
            ongkir = :ongkir,
            ice_pack = :ice_pack,
            diskon = :diskon,
            total = :total,
            supplier_id = :supplier_id,
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
				`is_restored` = 0
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

    public function deleteFile($filepath)
    {
        if (file_exists($filepath)) 
			unlink($filepath);
    }
}
