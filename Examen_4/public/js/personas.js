$(document).ready(function(){
    $('#tablaPersonasLoad').load('vistas/personas/tablaPersonas.php');
});
function agregarNuevaPersona() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregaPersona').serialize(),
        url: "procesos/personas/agregarpersona.php",
        success:function (respuesta) {
            if (respuesta == 1) {
                $('#tablaPersonasLoad').load('vistas/personas/tablaPersonas.php');
                $('#frmAgregaPersona')[0].reset();
                swal(";D","agregado con exito!!!","success");
            } else {
                swal(":´(","no se pudo agregar"+respuesta,"error");
            }
        }
    });
    return false;
}

function eliminarPersona(idpersona){
    swal({
        title: "Estas seguro de eliminar esta persona?",
        text: "Una vez eliminada, no podra recuperarse el registro!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                data: "idpersona="+idpersona,
                url: "procesos/personas/eliminarpersona.php",
                success:function (respuesta) {
                    if (respuesta == 1) {
                        $('#tablaPersonasLoad').load('vistas/personas/tablaPersonas.php');
                        swal(";D","se elimino con extio!!!","success");
                    } else {
                        swal(":´(","no se pudo eliminar"+respuesta,"error");
                    }
                }
            });
        } 
    });
}
function obtenerDatos(idpersonas) {
    $.ajax({
        type: "POST",
        data: "idpersona="+idpersonas,
        url: "procesos/personas/obtenerdatos.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombre']);
            $('#telefonou').val(respuesta['telefono']);
            $('#emailu').val(respuesta['email']);
            $('#idpersona').val(respuesta['idpersona']);
        }
    });
}
function actualizarPersona() {
    $.ajax({
        type:"POST",
        data: $('#frmActualizaPersona').serialize(),
        url: "procesos/personas/actualizarpersona.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaPersonasLoad').load('vistas/personas/tablaPersonas.php')
                swal(";D","si se pudo Actualizar!!!!","success")
            } else {
                swal(":´(","no se pudo actualizar"+respuesta,"error");
            }
        }
    });
    return false;
}