<?php

include_once 'NilaiService.php';
include_once '../manager/DaoManager.php';

class NilaiServiceImpl implements NilaiService {
    
    private $daoManager;
    private $nilaiDao;
    
    public function __construct() {
        $this->daoManager=new DaoManager();
        $this->nilaiDao=  $this->daoManager->getNilaiDao();
    }
    public function simpanNilai(Nilai $nilaiObj) {
        $this->nilaiDao->simpanNilai($nilaiObj);
    }
}

?>
