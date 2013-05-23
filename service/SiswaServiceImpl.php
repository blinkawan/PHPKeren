<?php

include_once'SiswaService.php';
 include_once '../manager/DaoManager.php';

class SiswaServiceImpl implements SiswaService {
    private $daoManager;
    private $siswaDao;

    public function setSiswaDao(SiswaDao $siswaDao){
        $this->siswaDao=$siswaDao;
    }
    
    public function __construct() {
        $this->daoManager=new DaoManager();
        $this->siswaDao=$this->daoManager->getSiswaDao();
    }
    public function ambilSiswa($nomorSiswa) {
        return $this->siswaDao->ambilSiswa($nomorSiswa);
    }

    public function ambilSiswaDenganKelas($nomorSiswa) {
        return $this->siswaDao->ambilSiswaDenganKelas($nomorSiswa);
    }

    public function hapusSiswa($nomorSiswa) {
        $this->siswaDao->hapusSiswa($nomorSiswa);
    }

    public function simpanSiswa(Siswa $siswa) {
        $this->siswaDao->simpanSiswa($siswa);
    }

    public function ubahSiswa(Siswa $siswa) {
        $this->siswaDao->ubahSiswa($siswa);
    }

    public function ambilSemuaSiswaDenganKelas() {
        return $this->siswaDao->ambilSemuaSiswaDenganKelas();
    }
}

?>
