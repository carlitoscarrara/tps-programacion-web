<?php
header("Content-type: text/html; charset=utf-8");
// Email Submit

// Note: filter_var() requires PHP >= 5.2.0

if ( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

 

  // detect & prevent header injections

  $test = "/(content-type|bcc:|cc:|to:)/i";

  foreach ( $_POST as $key => $val ) {

    if ( preg_match( $test, $val ) ) {

      exit;

    }

  }



$headers = 'From: ' . $_POST["name"] . ' ' . $_POST["apellido"] . '<' . $_POST["email"] . '>' . "\r\n" .

    'Reply-To: ' . $_POST["email"] . "\r\n" .

    'Content-type: text/html; charset=utf-8' . "\r\n";



  //

  mail( "info@carrarainstalaciones.com",
    "Mensaje desde nuestra WEB",
    'Teléfono: ' . ' ' . $_POST['telefono'] .'.   '. $_POST['message'], $headers );

 


}

?>