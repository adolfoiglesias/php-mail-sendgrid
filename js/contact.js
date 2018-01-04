var Contact = function() {
    return {
        Verificar: function() {
          
          
            var nombre = $("#name").val();
            var email = $("#email").val();
            var mensaje = $('textarea[name=message]').val();
            if ($.trim(nombre) === "") {
                $("#name").focus();
                return false;
            }
            if (email == "") {
                $("#email").focus();
                return false;
            }
            if (mensaje == "") {
                $("#message").focus();
                return false;
            }
          /*
            if ($("#message").val().length != 0) {
                $("#message").focus();
                //Quiero que diga el texto insertado es demasiado corto
                return false;
            }
            */
            return true;


        }, //Fin
        //
        //
        Enviar: function() {
            //
            var nombre = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var mensaje = $('textarea[name=message]').val();

            var parametros = {
                'nombre': nombre,
                'email': email,
                'message': mensaje,
                'subject': subject,
            }

            $.ajax({data: parametros,
                url: './php/sendMail.php',
                type: 'post',
                beforeSend: function() {
                    $("#resultado").html("Sending...");

                },
                success: function(response) {
                   console.log(response);
                    $("#resultado").html("Sent");
                }
            });

        }, Limpiar: function() {
            $("#nombre").val("");
            $("#email").val("");
            $("#message").val("");
            $("#subject").val("");

        }, Validar_email: function(email) {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email))
                return false;
            return true;
        }
    };
}();
