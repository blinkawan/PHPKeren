<?php

class MataPelajaran{
	private $idMataPelajaran;
    private $mataPelajaran;
    private $nilai;

    public function __construct(){
        $this->nilai=new ArrayObject();
	}

    public function setIdMataPelajaran($idMataPelajaran){
    	$this->idMataPelajaran=$idMataPelajaran;
    }

    public function getIdMataPelajaran(){
    	return $this->idMataPelajaran;
    }

    public function setMataPelajaran($mataPelajaran){
    	$this->mataPelajaran=$mataPelajaran;
    }

    public function getMataPelajaran(){
    	return $this->mataPelajaran;
    }

    public function setNilai(ArrayObject $nilai){
        $this->nilai=$nilai;
    }

    public function getNilai(){
        return $this->nilai;
    }

}

?>