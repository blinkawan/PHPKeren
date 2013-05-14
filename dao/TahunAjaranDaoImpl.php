<?php
include_once 'TahunAjaranDao.php';
class TahunAjaranDaoImpl implements TahunAjaranDao{

	private $connection;

	public function setConnection(PDO $connection){
		$this->connection=$connection;
	}

	public function simpanTahunAjaran(TahunAjaran $tahunAjaranObj){
		$tahunAjaran=$tahunAjaranObj->getTahunAjaran();
		$keterangan=$tahunAjaranObj->getKeterangan();
		$ps=$this->connection->prepare("INSERT INTO tahun_ajaran(tahun_ajaran,keterangan) value(:tahunAjaran,:keterangan) ");
		$ps->bindParam(":tahunAjaran",$tahunAjaran,PDO::PARAM_INT);
		$ps->bindParam(":keterangan",$keterangan,PDO::PARAM_STR,50);
		$ps->execute();
		$this->connection=null;
	}
        
        public function ambilTahunAjaran($idTahunAjaran){
            $ps=$this->connection->prepare("SELECT * FROM tahun_ajaran where id_tahun_ajaran=:idTahunAjaran");
            $ps->bindParam(":idTahunAjaran",$idTahunAjaran, PDO::PARAM_INT);
            $ps->execute();
            $rs=$ps->fetchAll();
            foreach ($rs as $s){
                $tahunAjaran=new TahunAjaran();
                $tahunAjaran->setIdTahunAjaran($s["id_tahun_ajaran"]);
                $tahunAjaran->setTahunAjaran($s["tahun_ajaran"]);
                $tahunAjaran->setKeterangan($s["keterangan"]);
            }
            return $tahunAjaran;
        }
}

?>