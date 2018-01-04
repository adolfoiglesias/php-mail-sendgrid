<!DOCTYPE html>
<html>
<head>
	<title>Send Mail by php and sendgrid</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<!--<link rel="alternate" hreflang="es" href="http://qalarex.com/" /> -->

	<!-- Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	


</head>
<body>



	<div class="row">
		<div class="col-md-12">

			<form method="POST">
			  <div class="form-group">
			    <label for="name">Name *</label>
			    <input type="text" class="form-control" id="name" name="name" placeholder="">
			  </div>

			  <div class="form-group">
			    <label for="email">Email *</label>
			   <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
			  </div>

			   <div class="form-group">
	                <label for="subject">Subject</label>
	                <input type="text" class="form-control" id="subject" name="subject" placeholder="">
	            </div>

	            <div class="form-group">
	                <label for="message">Message *</label>
	                <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
	               
	        	</div>

            	<button class="btn btn-primary" id="enviar">Send email</button>		

			</form> 
	
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" role="alert" style="display:none;" id="exito">
            	<strong>Message is sent</strong>
	        </div>

	        <!-- Cuadro Error-->
	        <div class="alert alert-danger" role="alert" style="display:none;" id="llenar">
	            <strong>It can not sent the message</strong>
	            Please check the values field.
	        </div>                   

	        <!-- Email incorrecto-->
	        <div class=" alert alert-danger fade in" style="display:none;" id="valido">                        
	            <strong>Incorrect email!</strong>
	        </div>

		</div>
    </div>	




<!-- Java script code -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/contact.js"> </script>

	<script type="text/javascript" >

        $(document).ready(function() {

            $("#enviar").click(function(event) {

                event.preventDefault();
                var llenos = Contact.Verificar();
                if (llenos) {
                    if (Contact.Validar_email($("#email").val())) {

                        Contact.Enviar();
                        
                        $("#exito").css('display', 'inline');
                        $("#valido").css('display', 'none');
                        $("#llenar").css('display', 'none');
                        $("#error").css('display', 'none');
                        
                        Contact.Limpiar();
                    }
                    else {
                        $("#exito").css('display', 'none');
                        $("#valido").css('display', 'inline');
                        $("#llenar").css('display', 'none');
                        $("#error").css('display', 'none');
                    }
                } else if (!llenos) {
                    $("#llenar").css('display', 'inline');
                    $("#valido").css('display', 'none');
                    $("#exito").css('display', 'none');
                    $("#error").css('display', 'none');
                } else {
                    $("#error").css('display', 'inline');
                    $("#valido").css('display', 'none');
                    $("#exito").css('display', 'none');
                    $("#llenar").css('display', 'none');
                }

            });
        });

    </script>

</body>
</html>