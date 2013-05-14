<?php

include_once '../service/SiswaServiceImpl.php';
include_once '../entity/Siswa.php';
include_once '../service/KelasServiceImpl.php';

$perintah=$_POST["perintah"];
$siswa=new Siswa();
$kelasService=new KelasServiceImpl();
$siswaService=new SiswaServiceImpl();

if($perintah=="simpan"){
    $nama=$_POST["nama"];
    $idKelas=$_POST["kelas"];
    $kelasObj=$kelasService->ambilKelas($idKelas);
    $siswa->setNama($nama);
    $siswa->setKelas($kelasObj);
    $siswaService->simpanSiswa($siswa);
}
elseif($perintah=="ubah"){
    $nama=$_POST["nama"];
    $idKelas=$_POST["kelas"];
    $nomorSiswa=$_POST["nomorSiswa"];
    $kelasObj=$kelasService->ambilKelas($idKelas);
    $siswa->setNomorSiswa($nomorSiswa);
    $siswa->setNama($nama);
    $siswa->setKelas($kelasObj);
    $siswaService->ubahSiswa($siswa);
}
elseif ($perintah=="hapus") {
    $nomorSiswa=$_POST["nomorSiswa"];
    $siswaService->hapusSiswa($nomorSiswa);
}

?>
