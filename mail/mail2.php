<?php

// Check for empty fields
// if(empty($_POST['name'])      ||
//    empty($_POST['email'])     ||
//    empty($_POST['phone'])     ||
//    empty($_POST['message']) ||
//    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//    {
//   echo "No arguments Provided!";
//   return false;
//    }

// $name = $_POST['name'];
// $email_address = $_POST['email'];
// $phone = $_POST['phone'];
// $message = $_POST['message']

// echo "<br>".$name;
// echo "<br>".$email_address;
// echo "<br>".$phone;
// echo "<br>".$message;



//   $to = 'luis_ville_c_200905@hotmail.com'; ;
//   $subject = "My subject";
//   $txt = "Hello world!";
//   $headers = "From: webmaster@example.com" . "\r\n" .
//   "CC: somebodyelse@example.com";

//   mail($to,$subject,$txt,$headers);


// El mensaje
$mensaje = "Línea 1\r\nLínea 2\r\nLínea 3";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviarlo
mail('luis_ville_c_200905@hotmail.com', 'Mi título', $mensaje);


?>