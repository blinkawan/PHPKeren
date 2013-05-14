<?php

class Nilai{
	private $idNilai;
	private $siswa;
	private $mataPelajaran;
	private $nilai;
	private $tahunAjaran;

	public function __construct(){
		$this->siswa=new Siswa();
		$this->mataPelajaran=new MataPelajaran();
		$this->tahunAjaran=new TahunAjaran();
	}

	public function setIdNilai($idNilai){
		$this->idNilai=$idNilai;
	}

	public function getIdNilai(){
		return $this->idNilai;
	}

	public function setSiswa(Siswa $siswa){
		$this->siswa=$siswa;
	}

	public function getSiswa(){
		return $this->siswa;
	}

	public function setMataPelajaran(MataPelajaran $mataPelajaran){
		$this->mataPelajaran=$mataPelajaran;
	}

	public function getMataPelajaran(){
		return $this->mataPelajaran;
	}

	public function setNilai($nilai){
		$this->nilai=$nilai;
	}

	public function getNilai(){
		return $this->nilai;
	}

	public function setTahunAjaran($tahunAjaran){
		$this->tahunAjaran=$tahunAjaran;
	}

	public function getTahunAjaran(){
		return $this->tahunAjaran;
	}
}

?>