<?php
include_once'MataPelajaranDao.php';
class MataPelajaranDaoImpl implements MataPelajaranDao{

	private $connection;

	public function setConnection($connection){
        $this->connection=$connection;
	}

	public function simpanMataPelajaran(MataPelajaran $mataPelajaran){
		$mataPelajaran=$mataPelajaran->getMataPelajaran();
		$ps=$this->connection->prepare("INSERT INTO mata_pelajaran(mata_pelajaran) value(:mataPelajaran) ");
		$ps->bindParam(":mataPelajaran",$mataPelajaran,PDO::PARAM_STR,50);
		$ps->execute();
		$this->connection=null;
	}

	public function hapusMataPelajaran($idMataPelajaran){
		$ps=$this->connection->prepare("DELETE FROM mata_pelajaran where id_mata_pelajaran=:idMataPelajaran");
		$ps->bindParam(":idMataPelajaran",$idMataPelajaran,PDO::PARAM_INT);
		$ps->execute();
		$this->connection=null;
	}

	public function ubahMataPelajaran(MataPelajaran $mataPelajaran){
		$mataPelajaran=$mataPelajaran->getMataPelajaran();
		$ps=$this->connection->prepare("UPDATE mata_pelajaran set mata_pelajaran=:mataPelajaran");
		$ps->bindParam(":mataPelajaran",$mataPelajaran,PDO::PARAM_STR,50);
		$ps->execute();
		$this->connection=null;
	}

	public function ambilMataPelajaran($idMataPelajaran){
		$ps=$this->connection->prepare("SELECT * FROM mata_pelajaran where id_mata_pelajaran=:idMataPelajaran");
        $ps->bindParam(":idMataPelajaran",$idMataPelajaran,PDO::PARAM_INT);
        $ps->execute();
        $rs=$ps->fetchAll();
        foreach($rs as $s){
        	$mataPelajaran=new MataPelajaran();
        	$mataPelajaran->setIdMataPelajaran($s["id_mata_pelajaran"]);
        	$mataPelajaran->setMataPelajaran($s["mata_pelajaran"]);
        }
        return $mataPelajaran;
	}

	public function ambilSemuaMataPelajaran(){
		$mataPelajarans=new ArrayObject();
		$ps=$this->connection->prepare("SELECT * FROM mata_pelajaran");
        $ps->execute();
        $rs=$ps->fetchAll();
        foreach($rs as $s){
        	$mataPelajaran=new MataPelajaran();
        	$mataPelajaran->setIdMataPelajaran($s["id_mata_pelajaran"]);
        	$mataPelajaran->setMataPelajaran($s["mata_pelajaran"]);
        	$mataPelajarans->append($mataPelajaran);
        }
        return $mataPelajarans;
	}
}

?>