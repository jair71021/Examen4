<?php
  include "../../clases/personas.php";
  $personas=new Personas();
  $paterno=$_POST['paterno'];
  $materno=$_POST['materno'];
  $nombre=$_POST['nombre'];
  $telefono=$_POST['telefono'];
  $email=$_POST['email'];
  echo $personas->agregarPersona($paterno,$materno,$nombre,$telefono,$email);
?>