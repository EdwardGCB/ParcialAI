<?php
require ("./persistencia/Conexion.php");
require ("./persistencia/MarcaDao.php");

class Marca{
  private $idMarca;
  private $nombre;

  public function __construct($idMarca=0, $nombre=""){
    $this->idMarca = $idMarca;
    $this->nombre = $nombre;
  }

  public function getIdMarca(){
    return $this->idMarca;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setIdMarca($idMarca){
    $this->idMarca = $idMarca;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function consultarNombres(){
    $marcas = array();
    $conexion = new Conexion();
    $conexion -> abrirConexion();
    $marcaD = new MarcaDao();
    $conexion -> ejecutarConsulta($marcaD -> consultarNombres());
    while($registro = $conexion -> siguienteRegistro()){
        $marca = new Marca($registro[0]);
        array_push($marcas, $marca);
    }
    $conexion -> cerrarConexion();
    return $marcas;        
  }

}

?>