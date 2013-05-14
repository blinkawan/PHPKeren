<?php
include_once'SiswaDao.php';
include_once '../entity/Kelas.php';
include_once '../entity/Siswa.php';
class SiswaDaoImpl implements SiswaDao{

	private $connection;

	public function setConnection(PDO $connection){
		$this->connection=$connection;
	}

	public function simpanSiswa(Siswa $siswa){
		$nama=$siswa->getNama();
		$kelas=$siswa->getKelas()->getIdKelas();
        $ps=$this->connection->prepare("INSERT INTO siswa(nama,id_kelas) value(:nama,:kelas) ");
        $ps->bindParam(":nama",$nama,PDO::PARAM_STR,50);
        $ps->bindParam(":kelas",$kelas,PDO::PARAM_INT);
        $ps->execute();
        $this->connection=null;
	}

	public function hapusSiswa($nomorSiswa){
		$ps=$this->connection->prepare("DELETE FROM siswa WHERE nomor_siswa=:nomorSiswa");
		$ps->bindParam(":nomorSiswa",$nomorSiswa,PDO::PARAM_INT);
		$ps->execute();
		$this->connection=null;
	}

	public function ubahSiswa(Siswa $siswa){
		$nama=$siswa->getNama();
		$kelas=$siswa->getKelas()->getIdKelas();
		$nomorSiswa=$siswa->getNomorSiswa();
        $ps=$this->connection->prepare("UPDATE siswa SET nama=:nama, id_kelas=:kelas where nomor_siswa=:nomorSiswa ");
        $ps->bindParam(":nama",$nama,PDO::PARAM_STR,50);
        $ps->bindParam(":kelas",$kelas,PDO::PARAM_INT);
        $ps->bindParam(":nomorSiswa",$nomorSiswa,PDO::PARAM_INT);
        $ps->execute();
        $this->connection=null;
	}

	public function ambilSiswa($nomorSiswa){
		$ps=$this->connection->prepare("SELECT * FROM siswa WHERE nomor_siswa=:nomorSiswa");
		$ps->bindParam(":nomorSiswa",$nomorSiswa);
		$ps->execute();
		$rs=$ps->fetchAll();
		 foreach($rs as $s){
		 	$siswa=new Siswa();
		 	$siswa->setNomorSiswa($s["nomor_siswa"]);
		 	$siswa->setNama($s['nama']);
		 	$siswa->getKelas()->setIdKelas($s["id_kelas"]);
                        return $siswa;
		 }
		 
	}

	public function ambilSiswaDenganKelas($nomorSiswa){
		$ps=$this->connection->prepare("SELECT siswa.nomor_siswa,siswa.nama as namaSiswa,kelas.id_kelas,kelas.nama as namaKelas
			FROM siswa INNER JOIN kelas on(siswa.id_kelas=kelas.id_kelas) WHERE nomor_siswa=:nomorSiswa
                        ORDER BY namaKelas,namaSiswa");
		$ps->bindParam(":nomorSiswa",$nomorSiswa);
		$ps->execute();
		$rs=$ps->fetchAll();
		 foreach($rs as $s){
		 	$siswa=new Siswa();
		 	$kelas=new Kelas();
		 	$siswa->setNomorSiswa($s["nomor_siswa"]);
		 	$siswa->setNama($s['namaSiswa']);
		 	$kelas->setIdKelas($s["id_kelas"]);
            $kelas->setNama($s["namaKelas"]);

		 	$siswa->setKelas($kelas);
		 	
		 }
		 return $siswa;
	}

        public function ambilSemuaSiswaDenganKelas() {
               $ps=$this->connection->prepare("SELECT siswa.nomor_siswa,siswa.nama as namaSiswa,kelas.id_kelas,kelas.nama as namaKelas
			FROM siswa INNER JOIN kelas on(siswa.id_kelas=kelas.id_kelas)
                        ORDER BY namaKelas,namaSiswa");
		$ps->execute();
		$rs=$ps->fetchAll();
                $siswas=new ArrayObject();
		 foreach($rs as $s){
		 	$siswa=new Siswa();
		 	$kelas=new Kelas();
		 	$siswa->setNomorSiswa($s["nomor_siswa"]);
		 	$siswa->setNama($s['namaSiswa']);
		 	$kelas->setIdKelas($s["id_kelas"]);
            $kelas->setNama($s["namaKelas"]);

		 	$siswa->setKelas($kelas);
		 	$siswas->append($siswa);
		 }
		 return $siswas;
        }
    
}

?>

