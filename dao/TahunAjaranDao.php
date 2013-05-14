<?php

interface TahunAjaranDao{

	public function setConnection(PDO $connection);

	public function simpanTahunAjaran(TahunAjaran $tahunAjaranObj);
        
        public function ambilTahunAjaran($idTahunAjaran);
}

?>