<?php

interface TahunAjaranService{

	public function simpanTahunAjaran(TahunAjaran $tahunAjaranObj);
        
        public function ambilTahunAjaran($idTahunAjaran);
}

?>