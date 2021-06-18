<?php
  include "../../clases/personas.php";
  $personas=new Personas();
  $datos=array(
    "id_persona"=>$_POST['idpersona'],
    "paterno"=>$_POST['paternou'],
    "materno"=>$_POST['maternou'],
    "nombre"=>$_POST['nombreu'],
    "telefono"=>$_POST['telefonou'],
    "email"=>$_POST['emailu']
  );
  echo $personas->actualizarPersona($datos);
?>
