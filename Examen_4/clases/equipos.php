<?php
  include "Conexion.php";
  class Equipos extends Conexion {
    public function agregarEquipos($idpersona, $nombreEquipo, $modelo, $numeroSerie){
      $conexion= Conexion::conectar();
      $sql ="INSERT INTO t_equipo_computo (id_persona, nombre, modelo, numero_serie) VALUES ('$idpersona','$nombreEquipo','$modelo','$numeroSerie')";
      $respuesta= mysqli_query($conexion,$sql);
      return $respuesta;
    }
    public function eliminarEquipo($idequipo){
      $conexion= Conexion::conectar();
      $sql="DELETE FROM t_equipo_computo WHERE id_equipo='$idequipo'";
      $respuesta=mysqli_query($conexion,$sql);
      return $respuesta;
    }
    public function obtenerDatos($idequipo){
      $conexion= Conexion::conectar();
      $sql = "SELECT id_equipo,
							nombre,
							modelo,
							numero_serie,
							id_persona 
					FROM t_equipo_computo
					WHERE id_equipo = '$idequipo'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
						"id_equipo" => $equipo['id_equipo'],
						"id_persona" => $equipo['id_persona'],
						"nombre" => $equipo['nombre'],
						"modelo" => $equipo['modelo'],
						"numero_serie" => $equipo['numero_serie'] 
							);
			return $datos;
    }
    public function actualizarEquipo($datos){
      $conexion= Conexion::conectar();
      $sql = "UPDATE t_equipo_computo SET id_persona = ?, nombre = ?, modelo = ?, numero_serie = ? WHERE id_equipo = ?";
      $query=$conexion->prepare($sql);
      $query->bind_param(
        'isssi',$datos['id_persona'],
              $datos['nombre'],
              $datos['modelo'],
              $datos['numeroSerie'],
              $datos['id_equipo']
      );
      $respuesta=$query->execute();
      return $respuesta;
    }
  }
?>