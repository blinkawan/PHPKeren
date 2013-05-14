<?php

class TahunAjaran{

     private $idTahunAjaran;
     private $tahunAjaran;
     private $keterangan;

     public function setIdTahunAjaran($idTahunAjaran){
     	$this->idTahunAjaran=$idTahunAjaran;
     }

     public function getIdTahunAjaran(){
     	return $this->idTahunAjaran;
     }

     public function setTahunAjaran($tahunAjaran){
     	$this->tahunAjaran=$tahunAjaran;
     }

     public function getTahunAjaran(){
     	return $this->tahunAjaran;
     }

     public function setKeterangan($keterangan){
     	$this->keterangan=$keterangan;
     }

     public function getKeterangan(){
     	return $this->keterangan;
     }

}

?>