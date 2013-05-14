<?php
include_once  'MataPelajaranService.php';
include_once '../manager/DaoManager.php';

class MataPelajaranServiceImpl implements MataPelajaranService {
    
    private $daoManager;
    private $mataPelajaranDao;
    
    public function __construct() {
        $this->daoManager=new DaoManager();
        $this->mataPelajaranDao=$this->daoManager->getMataPelajaranDao();
    }
    
    public function ambilMataPelajaran($idMataPelajaran) {
        return $this->mataPelajaranDao->ambilMataPelajaran($idMataPelajaran);
    }

    public function ambilSemuaMataPelajaran() {
        return $this->mataPelajaranDao->ambilSemuaMataPelajaran();
    }

    public function hapusMataPelajaran($idMataPelajaran) {
        $this->mataPelajaranDao->hapusMataPelajaran($idMataPelajaran);
    }

    public function simpanMataPelajaran(MataPelajaran $mataPelajaran) {
        $this->mataPelajaranDao->simpanMataPelajaran($mataPelajaran);
    }

    public function ubahMataPelajaran(MataPelajaran $mataPelajaran) {
        $this->mataPelajaranDao->ubahMataPelajaran($mataPelajaran);
    }
}

?>
