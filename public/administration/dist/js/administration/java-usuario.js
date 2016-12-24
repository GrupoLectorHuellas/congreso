
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
