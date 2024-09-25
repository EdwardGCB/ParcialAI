<?php

class MarcaDao{
  private $id;
  private $nombre;

  
  public function __construct($id=0, $nombre=""){
    $this -> id = $id;
    $this -> nombre = $nombre;
  }
  
  public function consultar(){
      return "select idMarca, nombre from Marca;";
  }

  public function consultaIndividual(){
    return "select nombre from Marca where idMarca = ". $this -> id .";";
  }
  
}

?>