<?php

class MarcaDao{
  private $nombre;
  
  public function __construct($nombre=""){
      $this -> nombre = $nombre;
  }
  
  public function consultarNombres(){
      return "select nombre from Marca;";
  }
  
  
}

?>