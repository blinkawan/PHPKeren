<?php
include_once'KelasDao.php';
include_once '../entity/Kelas.php';
class KelasDaoImpl implements KelasDao{
	private $connection;
    
    public function setConnection($connection){
    	$this->connection=$connection;
    }

    public function simpanKelas(Kelas $kelas){
    	$nama=$kelas->getNama();
    	$ps=$this->connection->prepare("INSERT INTO kelas(nama) value(:nama)");
    	$ps->bindParam(":nama",$nama,PDO::PARAM_STR,10);
    	$ps->execute();
    	$this->connection=null;
    }

    public function hapusKelas($idKelas){
    	$ps=$this->connection->prepare("DELETE from kelas where id_kelas=:idKelas");
    	$ps->bindParam(":idKelas",$idKelas,PDO::PARAM_INT);
    	$ps->execute();
    	$this->connection=null;
    }

    public function ubahKelas(Kelas $kelas){
    	$nama=$kelas->getNama();
    	$idKelas=$kelas->getIdKelas();
    	$ps=$this->connection->prepare("UPDATE SET nama=:nama where id_kelas=:idKelas ");
    	$ps->bindParam(":nama",$nama,PARAM_STR,10);
    	$ps->bindParam("idKelas",$idKelas,PARAM_INT);
    	$ps->execute();
    	$this->connection=null;
    }

    public function ambilKelas($idKelas){
    	$ps=$this->connection->prepare("SELECT * FROM kelas where id_kelas=:idKelas");
        $ps->bindParam("idKelas",$idKelas,PDO::PARAM_INT);
        $ps->execute();
        $rs=$ps->fetchAll();
        foreach($rs as $s){
        	$kelas=new Kelas();
        	$kelas->setIdKelas($s["id_kelas"]);
        	$kelas->setNama($s["nama"]);
        }
        return $kelas;
    }

    public function ambilSemuaKelas(){
    	$kelases=new ArrayObject();
    	$ps=$this->connection->prepare("SELECT * FROM kelas");
        $ps->execute();
        $rs=$ps->fetchAll();
        foreach($rs as $s){
        	$kelas=new Kelas();
        	$kelas->setIdKelas($s["id_kelas"]);
        	$kelas->setNama($s["nama"]);
        	$kelases->append($kelas);
        }
        return $kelases;
    }

}

?>