<?php
  include "../../clases/Conexion.php";
  $obj=new Conexion();
  $conexion=$obj->conectar();
  $idpersona =$_GET['idpersona'];
  $sql="SELECT id_persona, CONCAT(paterno,' ', materno, ' ', nombre) as nombre FROM t_persona";
  $result =mysqli_query($conexion,$sql);
?>
<label for="idPersonaU">Persona</label>
<select name="idPersonaU" id="idPersonaU" class="form-control" required>
    <option value="">Seleciona una persona</option>
    <?php 
      while($ver=mysqli_fetch_row($result)):
      if ($ver[0]==$idpersona) {
    ?>
    <option selected value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
    <?php } else {?>
      <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
    <?php } ?>
    <?php endwhile; ?>
</select>