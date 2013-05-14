<?php

interface SiswaDao{

	public function setConnection(PDO $connection);

	public function simpanSiswa(Siswa $siswa);

	public function hapusSiswa($nomorSiswa);

	public function ubahSiswa(Siswa $siswa);

	public function ambilSiswa($nomorSiswa);

	public function ambilSiswaDenganKelas($nomorSiswa);
        
        public function ambilSemuaSiswaDenganKelas();
    
}

?>

