<?php

interface NilaiDao{

	public function setConnection($connection);

	public function simpanNilai(Nilai $nilaiObj);
}

?>