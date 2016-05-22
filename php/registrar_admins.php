<?php
include('conexionBD.php');

//Activar las Sesiones en PHP
session_start();


$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno =  $_POST['materno'];
$tipo_usuario = 'admin';

$estado_cuenta =  "activa";


$nombre_tabla = 'usuario';
$query_usuario_insert = "INSERT INTO ".$nombre_tabla."(username, password, nombre, paterno, materno, tipo_usuario, estado_cuenta)
VALUES (:username, :password, :nombre, :paterno, :materno, :tipo_usuario, :estado_cuenta) ";

try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_usuario_insert);

    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okInsercion = $agenteSQL->execute(
                            array(
                                  ':username' => $username,
                                  ':password' => $password,
                                  ':nombre' => $nombre,
                                  ':paterno' => $paterno,
                                  ':materno' => $materno,
                                  ':tipo_usuario' => $tipo_usuario,
                                  ':estado_cuenta' => $estado_cuenta

                                ));


    header("Location: main_admin.php");
   
    $resultadoSQL = null;

}
catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "<br/>";
    //Cerrar conexion
    $conexionAlServidorBD = null;
    die();
}
catch(Exception $e){
  echo "¡Error!: " . $e->getMessage() . "<br/>";
  //Cerrar conexion
  $conexionAlServidorBD = null;
  die();
}

//Cerrar conexion
$conexionAlServidorBD = null;
?>