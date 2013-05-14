<?php
include '../entity/Siswa.php';
include '../entity/Kelas.php';
include '../entity/TahunAjaran.php';
include '../entity/MataPelajaran.php';
include '../entity/Nilai.php';
include '../dao/SiswaDaoImpl.php';
include '../dao/KelasDaoImpl.php';
include '../dao/TahunAjaranDaoImpl.php';
include '../dao/MataPelajaranDaoImpl.php';
include '../dao/NilaiDaoImpl.php';
include '../service/KelasServiceImpl.php';
include '../service/NilaiServiceImpl.php';
include '../service/MataPelajaranServiceImpl.php';
include '../service/SiswaServiceImpl.php';

$mapelService=new MataPelajaranServiceImpl();
$mapels=$mapelService->ambilSemuaMataPelajaran();

foreach ($mapels as $mapel){
    echo $mapel->getMataPelajaran()."</br>";
}

echo "</br>";

$kelasService=new KelasServiceImpl();
$kelases=$kelasService->ambilSemuaKelas();

foreach($kelases as $kelas){
    echo $kelas->getNama()."</br>";
}
echo "</br>";

$siswaService=new SiswaServiceImpl();
$siswas=$siswaService->ambilSemuaSiswaDenganKelas();

foreach ($siswas as $siswa){
   echo $siswa->getNomorSiswa();
   echo $siswa->getNama();
   echo $siswa->getKelas()->getNama();
}


?>