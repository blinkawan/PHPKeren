<?php

interface MataPelajaranDao{

	public function setConnection($connection);

	public function simpanMataPelajaran(MataPelajaran $mataPelajaran);

	public function hapusMataPelajaran($idMataPelajaran);

	public function ubahMataPelajaran(MataPelajaran $mataPelajaran);

	public function ambilMataPelajaran($idMataPelajaran);

	public function ambilSemuaMataPelajaran();
}

?>