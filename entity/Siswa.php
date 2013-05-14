<?php

class Siswa{

	private $nomorSiswa;
	private $nama;
	private $kelas;
    private $nilai;

    public function __construct(){
        $this->kelas=new Kelas();
        $this->nilai=new ArrayObject();
    }

    public function setNomorSiswa($nomorSiswa){
    	$this->nomorSiswa=$nomorSiswa;
    }

    public function getNomorSiswa(){
    	return $this->nomorSiswa;
    }

    public function setNama($nama){
    	$this->nama=$nama;
    }

    public function getNama(){
    	return $this->nama;
    }

    public function setKelas(Kelas $kelas){
    	$this->kelas=$kelas;
    }

    public function getKelas(){
    	return $this->kelas;
    }

    public function setNilai(ArrayObject $nilai){
        $this->nilai=$nilai;
    }

    public function getNilai(){
        return $this->nilai;
    }

}



?>