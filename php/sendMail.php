<?php
require '../vendor/autoload.php';


$nombre_err = $correo_err = $message_err = "";

$apiKey = "";
$fromMail = "";
$toMail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["nombre"])) {
        $nombre = $_POST['nombre'];
    } else {
        $nombre_err = "El nombre es requerido";
    }
    if (isset($_POST["email"])) {
        $correo = $_POST['email'];
    } else {
        $correo_err = "El correo electrónico es requerido";
    }
    if (isset($_POST["message"])) {
        $mensaje = $_POST['message'];
    } else {
        $message_err = "El correo electrónico es requerido";
    }
    if (isset($_POST["subject"])) {
        $asunto = $_POST['subject'];
    }
    if ($message_err == "" || $correo_err == "" || $nombre_err == "") {//Si No hay  error

        $from = new SendGrid\Email(null, $correo);
        $subject = "Desde  Calarix -> Asunto: " . $asunto;
        $to = new SendGrid\Email(null, $toMail);

        $content = new SendGrid\Content("text/plain", "Correo de contacto: ". $correo. " Nombre de la persona: ". $nombre . 
            ".  Mensaje: " . $mensaje);

        $mail = new SendGrid\Mail($from, $subject, $to, $content);

        
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);

         echo $response->statusCode() ;

    } else {
        $error = "Please check mandatory fields";
    }

//echo ($correo);die;
}
?>