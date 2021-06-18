<?php
  include "../../clases/equipos.php";
  $equipos=new Equipos();
  $datos=array(
    "id_equipo"=>$_POST['idequipo'],
    "id_persona"=>$_POST['idPersonaU'],
    "nombre"=>$_POST['nombreEquipou'],
    "modelo"=>$_POST['modelou'],
    "numeroSerie"=>$_POST['numeroSerieu'],
  );
  echo $equipos->actualizarEquipo($datos);
?>