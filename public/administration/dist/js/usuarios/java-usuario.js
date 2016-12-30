$("#ocupacion").change(function (event) {
    var valor = document.getElementById("ocupacion").value;
    if(valor =="Estudiante"){
        $("#carrera").show();
        $("#facultad").show();
        $("#titulo").hide();
    } else if (valor == "Profesional") {
        $("#carrera").hide();
        $("#facultad").hide();
        $("#titulo").show();
    }

});

$("#facultades").change(function (event) {
    var cod = document.getElementById("facultades").value;
    var ruta = document.getElementById("ruta").value;
    if(cod==''){
        $("#carreras").empty();
        $("#carreras").append("<option value=''>Seleccione la carrera</option>")
    }
    else {
        /*
         $.get('/congreso/public/carreras/' + event.target.value + "", function (response, facultades) {
         $("#carreras").empty();
         for (i = 0; i < response.length; i++) {
         $("#carreras").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

         }
         })
         */

        $.get(ruta +/carreras/+ event.target.value + "", function (response, facultades) {
            $("#carreras").empty();
            for (i = 0; i < response.length; i++) {
                $("#carreras").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })

    }

});

$(document).on('click','.pagination a',function(e){
    //e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var route = window.location;
    $.ajax({
        url: route,
        data: {page: page},
        type: 'GET',
        dataType: 'json',
        success: function(data){
            $(".ajax-tabla").html(data);
        }
    });
});

$(document).ready(function () {
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();
        swal({
                title: "Deseas eliminar el usuario ?",
                text: "Se excluira del sistema!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Aceptar!",
                cancelButtonText: "Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {

                    row.fadeOut();//para borrar la fila
                    $.post(url, data, function (result) {
                        swal("Eliminado!", result.message, "success");
                    }).fail(function () {
                        swal("Error!! Usuario no eliminado!");
                        row.show('slow');
                    });

                } else {
                    swal("Cancelado", "El usuario no fue eliminado :)", "error");
                }
            });

    });

});


