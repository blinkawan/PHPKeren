<?php

interface KelasService{

    public function simpanKelas(Kelas $kelas);

    public function hapusKelas($idKelas);

    public function ubahKelas(Kelas $kelas);

    public function ambilKelas($idKelas);

    public function ambilSemuaKelas();

}

?>