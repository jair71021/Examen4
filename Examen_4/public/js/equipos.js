$(document).ready(function(){
    $('#tablaEquipoLoad').load('vistas/equipos/tablaEquipos.php');
    $('#personasExistentes').load('vistas/equipos/listaPersonas.php');
    $('#personasExistentesUpdate').load('vistas/equipos/listaPersonasU.php');
});
function agregarEquipo(){
    $.ajax({
        type:"POST",
        data: $('#frmAgregarEquipo').serialize(),
        url: "procesos/equipos/agregarequipo.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaEquipoLoad').load('vistas/equipos/tablaEquipos.php');
                $('#frmAgregarEquipo')[0].reset();
                swal(":D","agregado con exito!","success");
            } else {
                swal(":(","No se pudo agregar! " + respuesta ,"error");
            }
        }
    });
    
    return false;
}
function eliminarEquipo(idequipo){
    swal({
        title: "Estas seguro de eliminar este equipo?",
        text: "Una vez eliminado, no podra recuperarse el registro!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data:"idequipo=" + idequipo,
                url:"procesos/equipos/eliminarequipo.php",
                success:function(respuesta) {
                    respuesta=respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaEquipoLoad').load('vistas/equipos/tablaEquipos.php');
                        swal(":D","eliminado con exito!","success");
                    } else {
                        swal(":(","No se pudo eliminar! " + respuesta ,"error");
                    }
                }
            });
        } 
    });
}
function obtenerDatos(idequipo) {
    $.ajax({
        type:"POST",
        data:"idequipo=" + idequipo,
        url:"procesos/equipos/obtenerdatos.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#nombreEquipou').val(respuesta['nombre']);
            $('#modelou').val(respuesta['modelo']);
            $('#numeroSerieu').val(respuesta['numero_serie']);
            $('#idequipo').val(respuesta['id_equipo']);
            $('#personasExistentesUpdate').load("vistas/equipos/listaPersonasU.php?idpersona="+respuesta['id_persona']);
        }
    });
}
function actualizarEquipo() {
    $.ajax({
        type:"POST",
        data: $('#frmActualizarEquipo').serialize(),
        url: "procesos/equipos/actualizarequipo.php",
        success:function(respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                $('#tablaEquipoLoad').load('vistas/equipos/tablaEquipos.php');
                swal(":D","actualizado con exito!","success");
            } else {
                swal(":(","No se pudo actualizar! " + respuesta ,"error");
            }
        }
    });
    return false;
}
