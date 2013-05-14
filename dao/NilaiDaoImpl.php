<?php
include_once 'NilaiDao.php';
class NilaiDaoImpl implements NilaiDao{

	private $connection;

	public function setConnection($connection){
		$this->connection=$connection;
	}

	public function simpanNilai(Nilai $nilaiObj){
		$nomorSiswa=$nilaiObj->getSiswa()->getNomorSiswa();
		$idMataPelajaran=$nilaiObj->getMataPelajaran()->getIdMataPelajaran();
		$nilai=$nilaiObj->getNilai();
		$idTahunAjaran=$nilaiObj->getTahunAjaran()->getIdTahunAjaran();

        $ps=$this->connection->prepare("INSERT INTO nilai(nomor_siswa,id_mata_pelajaran,nilai,id_tahun_ajaran) 
        	value(:nomorSiswa,:idMataPelajaran,:nilai,:idTahunAjaran) ");
        $ps->bindParam(":nomorSiswa",$nomorSiswa,PDO::PARAM_INT);
        $ps->bindParam(":idMataPelajaran",$idMataPelajaran,PDO::PARAM_INT);
        $ps->bindParam(":nilai",$nilai,PDO::PARAM_INT);
        $ps->bindParam("idTahunAjaran",$idTahunAjaran,PDO::PARAM_INT);
        $ps->execute();
        $this->connection=null;
	}
}

?>