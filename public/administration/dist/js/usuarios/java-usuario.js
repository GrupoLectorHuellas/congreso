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
    if(cod==''){
        $("#carreras").empty();
        $("#carreras").append("<option value=''>Seleccione la carrera</option>")
    }
    else {
        $.get('carreras/' + event.target.value + "", function (response, facultades) {
            $("#carreras").empty();
            for (i = 0; i < response.length; i++) {
                $("#carreras").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })
    }

});

$(document).on('click','.pagination a',function(e){
    e.preventDefault();
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
$("#registro").click(function(){
    var dato = $("#cedula").val();
    var route = window.location;
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:{cedula: dato},

        success:function(){
            $("#msj-success").fadeIn();
        },
        error:function(msj){
            $("#msj").html(msj.responseJSON.genre);
            $("#msj-error").fadeIn();
        }
    });
});


