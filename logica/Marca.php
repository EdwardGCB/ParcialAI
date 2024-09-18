<?php
require_once ("./persistencia/Conexion.php");
require_once ("./persistencia/MarcaDao.php");

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

  

  public function consultar(){
    $marcas = array();
    $conexion = new Conexion();
    $conexion -> abrirConexion();
    $marcaDao = new MarcaDao();
    $conexion -> ejecutarConsulta($marcaDao -> consultar());
    while($registro = $conexion -> siguienteRegistro()){
        $marca = new Marca($registro[0], $registro[1]);
        array_push($marcas, $marca);
    }
    $conexion -> cerrarConexion();
    return $marcas;
  }

  public function consultaIndividual($marca_idMarca){
    $marca = null;
    $conexion = new Conexion();
    $conexion -> abrirConexion();
    $marcaDao = new MarcaDao();
    $conexion -> ejecutarConsulta($marcaDao -> consultaIndividual($marca_idMarca));
    $registro = $conexion -> siguienteRegistro();
    if($registro){
      $marca = new Marca($registro[0], $registro[1]);
    }
    $conexion -> cerrarConexion();
    return $marca;
  }

}

?>