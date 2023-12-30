<?php 

class Mahasiswa_model {
     
    private $table = 'tabel_kopi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id_kopi){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kopi=:id_kopi');
        $this->db->bind('id_kopi', $id_kopi);
        return $this->db->single();
    }

    public function tambahDataKopi($data){

        $query = "INSERT INTO tabel_kopi
                    VALUES
                ('', :nama_kopi, :deskripsi, :harga_kopi, :gambar_kopi)";

        $this->db->query($query);
        $this->db->bind('nama_kopi', $data['nama_kopi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('harga_kopi', $data['harga_kopi']);
        $this->db->bind('gambar_kopi', $data['gambar_kopi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKopi($id_kopi){

        $query = "DELETE FROM tabel_kopi WHERE id_kopi = :id_kopi";

        $this->db->query($query);
        $this->db->bind('id_kopi', $id_kopi);
        $this->db->execute();

        return $this->db->rowCount();

    }

    public function updateDataKopi($data){

        $query = "UPDATE tabel_kopi SET
                    nama_kopi = :nama_kopi,
                    deskripsi = :deskripsi,
                    harga_kopi = :harga_kopi,
                    gambar_kopi = :gambar_kopi
                  WHERE id_kopi = :id_kopi";

        $this->db->query($query);
        $this->db->bind('nama_kopi', $data['nama_kopi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('harga_kopi', $data['harga_kopi']);
        $this->db->bind('gambar_kopi', $data['gambar_kopi']);
        $this->db->bind('id_kopi', $data['id_kopi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataKopi(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tabel_kopi WHERE nama_kopi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }

}