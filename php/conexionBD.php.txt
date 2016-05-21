<?php
  $nombreBD = "udasoccer";
  $servernameBD = "localhost";
  $usernameServerBD = "root";
  $passwordServerBD = "";

  $cadena_conexion_BD = 'mysql:host='.$servernameBD.';dbname='.$nombreBD;

  try {
      //Nota.- PDO debe ser activado en PHP
      $conexionAlServidorBD = new PDO($cadena_conexion_BD, $usernameServerBD, $passwordServerBD);

      $nombre_tabla_prueba = "usuario";
      $query_de_prueba_conexion = "SELECT COUNT(*) FROM ".$nombreBD.$nombre_tabla_prueba;
      $resultadoSQL = $conexionAlServidorBD->prepare($query_de_prueba_conexion);
      $resultadoSQL->execute();

      //Devolver el valor de la primera columna {count (*)}
      $count = $resultadoSQL->fetchColumn();

      $resultadoSQL = null;

  } catch (PDOException $e) {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
  }

?>
