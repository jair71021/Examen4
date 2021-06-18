<?php
  include "../../clases/equipos.php";
  $equipos=new Equipos();
  $idequipo=$_POST['idequipo'];
  echo $equipos->eliminarEquipo($idequipo);
?>