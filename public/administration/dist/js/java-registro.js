$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
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

});
$("#nacionalidades").change(function (event) {
    var cod = document.getElementById("nacionalidades").value;
    var input_pais= document.getElementById("pais");
    if (cod =='Extranjero No Residente'){
        $('#label-dni').html('DNI/Pasaporte');
        $('#label-pais').html('Pais');
        $('#label-provincia').html('Provincia');
        $('#label-canton').html('Cantón');
        input_pais.disabled= false;
        input_pais.value="";
        $("#ciudad").show();
        $("#provincia").hide();
        $("#canton").hide();

    }else if (cod =='Ecuatoriano'){
        $('#label-dni').html('Cedula');
        $('#label-pais').html('Pais');
        $('#label-provincia').html('Provincia');
        $('#label-canton').html('Cantón');
        input_pais.disabled= true;
        input_pais.value="Ecuador";
        $("#ciudad").hide();
        $("#provincia").show();
        $("#canton").show();

    }else if (cod =='Extranjero Residente' ){
        $('#label-dni').html('DNI/Pasaporte');
        $('#label-pais').html('Pais Origen');
        $('#label-provincia').html('Provincia Hospedado');
        $('#label-canton').html('Cantón Hospedado');
        input_pais.disabled= false;
        input_pais.value="";
        $("#ciudad").hide();
        $("#provincia").show();
        $("#canton").show();

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
$("#provincias").change(function (event) {
    var cod = document.getElementById("provincias").value;
    if(cod==''){
        $("#cantones").empty();
        $("#cantones").append("<option value=''>Seleccione el cantón</option>")
    }
    else {
        $.get('cantones/' + event.target.value + "", function (response, provincias) {
            $("#cantones").empty();
            for (i = 0; i < response.length; i++) {
                $("#cantones").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })
    }

});
