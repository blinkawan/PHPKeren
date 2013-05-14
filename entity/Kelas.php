<?php

class Kelas{
	
	private $idKelas;
	private $nama;
	private $siswa;

	public function __construct(){
		$this->siswa=new ArrayObject();
	}

	public function setIdkelas($idKelas){
		$this->idKelas=$idKelas;
	}

	public function getIdKelas(){
		return $this->idKelas;
	}

	public function setNama($nama){
		$this->nama=$nama;
	}

	public function getNama(){
		return $this->nama;
	}

	public function setSiswa(ArrayObject $siswa){
		$this->siswa=$siswa;
	}

	public function getSiswa(){
		return $this->siswa;
	}
}

?>