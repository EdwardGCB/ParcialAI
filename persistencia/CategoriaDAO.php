<?php

class CategoriaDAO{
  private $id;
  private $nombre;

  
  public function __construct($id=0, $nombre=""){
    $this -> id = $id;
    $this -> nombre = $nombre;
  }
  
  public function consultar(){
      return "select idCategoria, nombre from Categoria;";
  }

  public function consultaIndividual(){
    return "select idCategoria, nombre from Categoria where idCategoria = ". $this -> id.";";
  }
  
}

?>