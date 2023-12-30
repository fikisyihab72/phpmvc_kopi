<?php

class About extends Controller {
    public function index($nama = 'Fiki', $hobby = 'Ngegame') 
    {
        $data['nama'] = $nama;
        $data['hobby'] = $hobby;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}