<?php
  include "../../clases/personas.php";
  $personas=new Personas();
  $idpersona=$_POST['idpersona'];
  echo json_encode($personas->obtenerDatos($idpersona));
?>