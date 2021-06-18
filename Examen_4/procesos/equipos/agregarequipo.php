<?php
  include "../../clases/equipos.php";
  $equipos=new Equipos();
  $idpersona = $_POST['idPersona'];
  $nomreEquipo = $_POST['nombreEquipo'];
  $modelo = $_POST['modelo'];
  $numeroSerie = $_POST['numeroSerie'];

  echo $equipos->agregarEquipos($idpersona, $nomreEquipo, $modelo, $numeroSerie);
?>