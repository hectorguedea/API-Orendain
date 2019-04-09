<?php
/**************************************************
Class API para Autotrasporte Orendain
Fecha de creación: 20/02/2019
Creado por: Héctor Guedea
***************************************************/

class API {

 protected $data; 

 function __construct() {
       $this->data = array('SecurityToken' => 'SECURITY-NUMBER-HERE', 'ClientName' => 'CLIENT-NAME-HERE');
   }

private function object2array($object) { 
    return @json_decode(@json_encode($object),1); 
} 

private function DataSource($data,$url){
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
      ),
      "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === false) { }
   return simplexml_load_string(simplexml_load_string($result));
  // return $this->object2array($r); 
}

public function getPositionByClientName(){
      $url = 'http://www.avltecnologistik.com/webservices/wstrack.asmx/getPositionByClientName';
      $result = $this->DataSource($this->data,$url);
      return $result->Table;
}

public function GetCurrentPositionByClientName(){
     $url = 'http://www.avltecnologistik.com/webservices/wstrack.asmx/GetCurrentPositionByClientName';
     $result= $this->DataSource($this->data,$url);
     return $result;
}

}
?>
