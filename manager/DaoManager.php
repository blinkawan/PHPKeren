<?php
include_once '../dao/SiswaDaoImpl.php';
include_once '../dao/KelasDaoImpl.php';
class DaoManager{
    
    private $connection;
    private $hostname;
    private $username;
    private $password;
    
    private $kelasDao;
    private $mataPelajaranDao;
    private $nilaiDao;
    private $siswaDao;
    private $tahunAjaranDao;
    
    public function __construct(){
        $this->hostname = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->connection = new PDO("mysql:host=$this->hostname;dbname=nilaisiswa", $this->username, $this->password);
    }
    
    public function getKelasDao(){
        if($this->kelasDao==null){
            $this->kelasDao=new KelasDaoImpl();
            $this->kelasDao->setConnection($this->connection);
        }
        return $this->kelasDao;
    }
    
    public function getMataPelajaranDao(){
        if($this->mataPelajaranDao==null){
            $this->mataPelajaranDao=new MataPelajaranDaoImpl();
            $this->mataPelajaranDao->setConnection($this->connection);
        }
        return $this->mataPelajaranDao;
    }
    
    public function getNilaiDao(){
        if($this->nilaiDao==null){
            $this->nilaiDao=new NilaiDaoImpl();
            $this->nilaiDao->setConnection($this->connection);
        }
        return $this->nilaiDao;
    }
    
    public function getSiswaDao(){
        if($this->siswaDao==null){
            $this->siswaDao=new SiswaDaoImpl();
            $this->siswaDao->setConnection($this->connection);
        }
        return $this->siswaDao;
    }
    
    public function  getTahunAjaranDao(){
        if($this->tahunAjaranDao==null){
            $this->tahunAjaranDao=new TahunAjaranDaoImpl();
            $this->tahunAjaranDao->setConnection($this->connection);
        }
        return $this->tahunAjaranDao;
    }
    
}
?>