<?php
    class SuratPeringatan_model {

        private $table = 'suratperingatan';
        private $db;

        public function __construct(){
            $this -> db = new Database;
        }

        public function getAllData(){
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->fetchAll();
        }

        public function getDataById($id){
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->fetch();
        }
       

        public function tambahDataSurat($data){

           
		$this->db->query(
			"INSERT INTO {$this->table} 
				VALUES
			(null, :nama, :email, :jabatan, :alamat, :kesalahan)"
		);
            //binding
            
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jabatan', $data['jabatan']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('kesalahan', $data['kesalahan']);
            $this->db->execute();

            //mengembalikan nilai angka
            return $this->db->rowCount();
        }

        public function hapusDataSurat($id){
        $query = "DELETE FROM suratperingatan WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataSurat($data)
    {
        $query = "UPDATE {$this->table} SET
                    nama = :nama,
                    email = :email,
                    jabatan = :jabatan,
                    alamat = :alamat,
                    kesalahan = :kesalahan
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kesalahan', $data['kesalahan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function filterDataJurnal($keyword, $from, $to)
    {   
        $query = "SELECT * FROM tabel_jurnal";

        if ($keyword || ($from && $to)) {
            $query .= " WHERE ";

            $params = [];

            if ($keyword) array_push($params, "ruangan = :keyword");
            if ($from && $to) array_push($params, "tanggal >= :from AND tanggal <= :to");

            $params = join(" AND ", $params);
            
            $query .= $params;

            $this->db->query($query);

            if ($keyword) {
                $this->db->bind('keyword', $keyword);
            }
            if ($from && $to) {
                $this->db->bind('from', $from);
                $this->db->bind('to', $to);
            }

        } else {
            $this->db->query($query);
        }

        // return $this->db->fetchAll();
    }

    public function cariDataSurat(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM suratperingatan WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();  
    }
}
?>