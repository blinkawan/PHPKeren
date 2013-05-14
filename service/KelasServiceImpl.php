<?php
include_once 'KelasService.php';
 include_once '../manager/DaoManager.php';

class KelasServiceImpl implements KelasService {
    
    private $daoManager;
    private $kelasDao;
    
    public function __construct(){
        $this->daoManager=new DaoManager();
        $this->kelasDao=$this->daoManager->getKelasDao();
    }
    
    public function ambilKelas($idKelas) {
        return $this->kelasDao->ambilKelas($idKelas);
    }

    public function ambilSemuaKelas() {
        return $this->kelasDao->ambilSemuaKelas();
    }

    public function hapusKelas($idKelas) {
        $this->kelasDao->hapusKelas($idKelas);
    }

    public function simpanKelas(Kelas $kelas) {
        $this->kelasDao->simpanKelas($kelas);
    }

    public function ubahKelas(Kelas $kelas) {
        $this->kelasDao->ubahKelas($kelas);
    }
}

?>
