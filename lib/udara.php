<?php
include_once (__DIR__ . "/DB.php");
class Sensor{
    private $table_name='log';
    private $db = null;
    public  $id;
    private $humidity = null;
    private $temperature=null;
    private $gas_dan_asap=null;
    private $co=null;
    private $amonia=null;
    private $hidrogen_sulfida=null;
    private $konsentrasi_debu=null;


    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }

    function setValue($humidity, $temperature, $gas_dan_asap, $co, $amonia, $hidrogen_sulfida, $konsentrasi_debu){
        // $this();
//        $this->id = $id;
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->gas_dan_asap = $gas_dan_asap;
        $this->co = $co;
		$this->amonia = $amonia;
		$this->hidrogen_sulfida = $hidrogen_sulfida;
		$this->konsentrasi_debu = $konsentrasi_debu;

    }


    ///fungsi pennyimpanan data berhasil atau tidak
    function create(){
        // $count = count($this->getBukuPilihan($this->kode_buku));
        $bk= $this->getUdaraPilihan($this->id);
        $count = count($bk["data"]);
        if ($count>0) {
            http_response_code(503);
            return array('msg' => "Data sudah ada, tidak berhasil disimpan");
        } 

        else{
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "humidity='".$this->humidity ."',";
            $kueri .= "temperature='".$this->temperature ."',";
            $kueri .= "gas_dan_asap='".$this->gas_dan_asap ."',";
            $kueri .= "co='".$this->co ."',";
            $kueri .= "amonia='".$this->amonia ."',";
            $kueri .= "hidrogen_sulfida='".$this->hidrogen_sulfida ."',";
            $kueri .= "konsentrasi_debu='".$this->konsentrasi_debu."'";
            $hasil = $this->db->query($kueri);
            if ($hasil) {
                http_response_code(200);
                return array('msg' => 'success');
            } else {
                http_response_code(500);
                return array('msg' => 'Data Gagal disimpan '.$this->db->error);
            }

        }
    }
    
    function getAll(){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name."";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        http_response_code(200);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        if(count($data)==0)
            return array("msg"=>"Data Tidak Ada", "data"=>array());
        
        return array("data"=>$data);
    }

    function getAllFilter(){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name." ORDER BY waktu DESC LIMIT 1";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        http_response_code(200);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        if(count($data)==0)
            return array("msg"=>"Data Tidak Ada", "data"=>array());
        
        return array("data"=>$data);
    }
    // function getSensorPilihan($id){
    //     // return "test";
    //     $kueri = "SELECT * FROM ".$this->table_name;
    //     $kueri .=" WHERE id='".$id."'";
    //     $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
    //     http_response_code(200);
    //     $data = array();
    //     while ($row = $hasil->fetch_assoc()){
    //         $data[]=$row;
    //     }
    //     if (count($data)==0)
    //         return array("msg"=>"Data tidak ada ", "data"=>array());
    //     return array("msg"=>"success", "data"=>$data);
    // }

    function getUdaraPilihan($id){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE id='".$id."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        http_response_code(200);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        if (count($data)==0)
            return array("msg"=>"Data tidak ada ", "data"=>array());
        return array("msg"=>"success", "data"=>$data);
    }

}
