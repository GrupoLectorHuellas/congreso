$("#registro").click(function(){
    var form = $('#form');
    var route = window.location;
    var token = $("#token").val();
    var dato = form.serialize();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:dato,

        success:function(){
            /*
             swal({
             title: "Buen Trabajo!",
             text: "Usuario agregado correctamente",
             type: "success"
             },
             function(){
             window.location.href = "login";
             });
             */

            alertify.alert('Usuario Registrado', 'Usuario registrado, ahora puede iniciar sesion!',
                function(){
                    window.location.href = "login";
                })
                .setHeader('<em> Usuario Registrado!! </em> ')
                .setContent('<b>Datos enviados correctamente. Ahora puede iniciar sesion!</b>').show()
                .set({transition:'zoom'}).show();



            // window.location="login";
        },
        error:function(msj){

            document.getElementById("ponerfocus").focus();
            $('#ponerfocus').show();

            $('#msj-errors').fadeIn();
            $("#error_identificacion").html("");
            $("#error_nombres").html("");
            $("#error_apellidos").html("");
            $("#error_telefono").html("");
            $("#error_pais").html("");
            $("#error_ciudad").html("");
            $("#error_provincia").html("");
            $("#error_canton").html("");
            $("#error_direccion").html("");
            $("#error_canton").html("");
            $("#error_direccion").html("");
            $("#error_facultad").html("");
            $("#error_carrera").html("");
            $("#error_email").html("");
            $("#error_password").html("");
            $.each(msj.responseJSON, function(i, field){
                if(i==="identificacion"){
                    $("#error_identificacion").html(field);
                }
                else if(i==="nombres"){
                    $("#error_nombres").html(field);
                }
                else if(i==="apellidos"){
                    $("#error_apellidos").html(field);
                }
                else if(i==="telefono"){
                    $("#error_telefono").html(field);
                }
                else if(i==="pais"){
                    $("#error_pais").html(field);
                }
                else if(i==="ciudad"){
                    $("#error_ciudad").html(field);
                }
                else if(i==="provincia"){
                    $("#error_provincia").html(field);
                }
                else if(i==="canton"){
                    $("#error_canton").html(field);
                }
                else if(i==="direccion"){
                    $("#error_direccion").html(field);
                }
                else if(i==="facultad"){
                    $("#error_facultad").html(field);
                }
                else if(i==="carrera"){
                    $("#error_carrera").html(field);
                }
                else if(i==="email"){
                    $("#error_email").html(field);
                }
                else if(i==="password"){
                    $("#error_password").html(field);
                }



            });


        }
    });
});
