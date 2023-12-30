<?php

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Kopi';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');

    }

    public function detail($id_kopi)
    {
        $data['judul'] = 'Detail Kopi';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id_kopi);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');

    }

    public function tambah(){
        
        if( $this->model('Mahasiswa_model')->tambahDataKopi($_POST) > 0 ){
            
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id_kopi){
        
        if( $this->model('Mahasiswa_model')->hapusDataKopi($id_kopi) > 0 ){
            
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }


    public function getupdate(){
       echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id_kopi']));
    }

    public function update(){
        
        if( $this->model('Mahasiswa_model')->updateDataKopi($_POST) > 0 ){
            
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Daftar Kopi';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataKopi();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

}