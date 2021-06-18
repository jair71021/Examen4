<?php
  include "Conexion.php";
  class Personas extends Conexion{
    public function obtenerDatos($idpersona){
      $conexion= Conexion::conectar();
      $sql="SELECT id_persona,
                  paterno,
                  materno,
                  nombre,
                  email,
                  telefono
                  FROM t_persona 
                  WHERE id_persona='$idpersona'";
      $result=mysqli_query($conexion, $sql);
      $persona=mysqli_fetch_array($result);
      $datos=array(
        "idpersona"=>$persona['id_persona'],
        "paterno"=>$persona['paterno'],
        "materno"=>$persona['materno'],
        "nombre"=>$persona['nombre'],
        "email"=>$persona['email'],
        "telefono"=>$persona['telefono']
      );
      return $datos;
    }
    public function eliminarPersona($idpersona){
      $conexion= Conexion::conectar();
      $sql="DELETE FROM t_persona WHERE id_persona='$idpersona'";
      $respuesta=mysqli_query($conexion,$sql);
      return $respuesta;
    }
    public function agregarPersona($paterno, $materno, $nombre, $telefono, $email){
      $conexion= Conexion::conectar();
      $sql="INSERT INTO t_persona (paterno, materno, nombre, email, telefono) VALUES ('$paterno','$materno','$nombre','$email','$telefono')";
      $respuesta=mysqli_query($conexion,$sql);
      return $respuesta;
    }
    public function actualizarPersona($datos){
      $conexion= Conexion::conectar();
      $sql="UPDATE t_persona SET paterno=?, materno=?, nombre=?, email=?, telefono=? WHERE id_persona=?";
      $query=$conexion->prepare($sql);
      $query->bind_param(
        'sssssi',$datos['paterno'],
                $datos['materno'],
                $datos['nombre'],
                $datos['email'],
                $datos['telefono'],
                $datos['id_persona']
      );
      $respuesta=$query->execute();
      return $respuesta;
    }
  }
?>