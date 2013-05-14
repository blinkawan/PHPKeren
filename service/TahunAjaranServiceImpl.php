<?php

include_once'TahunAjaranService.php';
 include_once '../manager/DaoManager.php';

class TahunAjaranServiceImpl implements TahunAjaranService {
    private $daoManager;
    private $tahunAjaranDao;
    
    public function __construct() {
        $this->daoManager=new DaoManager();
        $this->tahunAjaranDao=$this->daoManager->getTahunAjaranDao();
    }

    public function ambilTahunAjaran($idTahunAjaran) {
        return $this->tahunAjaranDao->ambilTahunAjaran($idTahunAjaran);
    }

    public function simpanTahunAjaran(TahunAjaran $tahunAjaranObj) {
        $this->tahunAjaranDao->simpanTahunAjaran($tahunAjaranObj);
    }
}

?>
