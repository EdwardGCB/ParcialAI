<?php
require_once ("./persistencia/Conexion.php");
require_once ("./persistencia/CategoriaDAO.php");

class Categoria{
  private $idCategoria;
  private $nombre;

  public function __construct($idCategoria=0, $nombre=""){
    $this->idCategoria = $idCategoria;
    $this->nombre = $nombre;
  }

  public function getIdCategoria(){
    return $this->idCategoria;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setIdCategoria($idCategoria){
    $this->idCategoria = $idCategoria;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  

  public function consultar(){
    $categorias = array();
    $conexion = new Conexion();
    $conexion -> abrirConexion();
    $categoriaDAO = new CategoriaDao();
    $conexion -> ejecutarConsulta($categoriaDAO -> consultar());
    while($registro = $conexion -> siguienteRegistro()){
        $categoria = new Categoria($registro[0], $registro[1]);
        array_push($categorias, $categoria);
    }
    $conexion -> cerrarConexion();
    return $categorias;
  }

  public function consultaIndividual($categoria_idCategoria){
    $categoria = null;
    $conexion = new Conexion();
    $conexion -> abrirConexion();
    $categoriaDAO = new CategoriaDAO();
    $conexion -> ejecutarConsulta($categoriaDAO -> consultaIndividual($categoria_idCategoria));
    $registro = $conexion -> siguienteRegistro();
    if($registro){
      $categoria = new Categoria($registro[0], $registro[1]);
    }
    $conexion -> cerrarConexion();
    return $categoria;
  }

}

?>