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
        
        $maxFileSize = 5 * 1024 * 1024; // 5 MB

        if ($_FILES['gambar_kopi']['size'] > $maxFileSize) {
            // File size exceeds the limit
            die("File size is too large.");
        } else {
            $lokasi_file = $_FILES['gambar_kopi']['tmp_name'];
            $tipe_file = $_FILES['gambar_kopi']['type'];
            $nama_file = $_FILES['gambar_kopi']['name'];
            //$direktori = "http://localhost/phpmvc/public/img/$nama_file";
            $uploaddir = '../public/img/';
            
            $namabasis = basename($_FILES['gambar_kopi']['name']);
            $timestamp = time();
            $newFileName = $timestamp . "_" . $namabasis;
            
            $uploadfile = $uploaddir . $newFileName;
            //$move = "/Users/George/Desktop/uploads/".$_FILES['file']['name'];
            

            if(!empty($lokasi_file)){
                move_uploaded_file($_FILES['gambar_kopi']['tmp_name'], $uploadfile);
                //move_uploaded_file($_FILES['file']['tmp_name'], $move);
                $query = "INSERT INTO tabel_kopi
                            VALUES
                        ('', :nama_kopi, :deskripsi, :harga_kopi, :gambar_kopi)";

                $this->db->query($query);
                $this->db->bind('nama_kopi', $data['nama_kopi']);
                $this->db->bind('deskripsi', $data['deskripsi']);
                $this->db->bind('harga_kopi', $data['harga_kopi']);
                //$this->db->bind('gambar_kopi', $data['gambar_kopi']);
                $this->db->bind('gambar_kopi', $uploadfile);

                $this->db->execute();

                return $this->db->rowCount();
            } else {

                echo "gagal input";
            }
        }
    }

    public function hapusDataKopi($id_kopi, $data_lama){

        $query = "DELETE FROM tabel_kopi WHERE id_kopi = :id_kopi";

        $this->db->query($query);
        $this->db->bind('id_kopi', $id_kopi);
        if (file_exists($data_lama['gambar_lama']['gambar_kopi'])) {
            unlink($data_lama['gambar_lama']['gambar_kopi']);
            echo "Old image deleted successfully";
        } else {
            echo "Old image not found";
        }
        $this->db->execute();

        return $this->db->rowCount();

    }

    public function updateDataKopi($data, $data_lama){
        
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
        
        

        if(!empty($_FILES['gambar_kopi']['name'])){
            $uploaddir = '../public/img/';

            $namabasis = basename($_FILES['gambar_kopi']['name']);
            $timestamp = time();
            $newFileName = $timestamp . "_" . $namabasis;

            $uploadfile = $uploaddir . $newFileName;

            move_uploaded_file($_FILES['gambar_kopi']['tmp_name'], $uploadfile);
            

            if (file_exists($data_lama['gambar_lama']['gambar_kopi'])) {
                unlink($data_lama['gambar_lama']['gambar_kopi']);
                echo "Old image deleted successfully";
            } else {
                echo "Old image not found";
            }
            $this->db->bind('gambar_kopi', $uploadfile);

        } else {
            
            $this->db->bind('gambar_kopi', $data_lama['gambar_lama']['gambar_kopi']);
            
        }

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