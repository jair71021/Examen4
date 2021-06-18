<?php
  include "../../clases/equipos.php";
  $equipos=new Equipos();
  $idequipo=$_POST['idequipo'];
  echo json_encode($equipos->obtenerDatos($idequipo));
?>