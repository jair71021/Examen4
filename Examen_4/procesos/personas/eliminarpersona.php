<?php
  include "../../clases/personas.php";
  $personas=new Personas();
  $idpersona=$_POST['idpersona'];
  echo $personas->eliminarPersona($idpersona);
?>