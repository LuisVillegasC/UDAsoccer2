<?php
include('conexionBD.php');

//Activar las Sesiones en PHP
session_start();

//LOGIN solo cuentas 'ACTIVAS'
$estado_cuenta = 'activa';

$nombre = $_POST['nombre'];
$fecha_registro = date("Y").'-'.date("m").'-'.date("d");


$nombre_tabla = 'equipo';
$query_usuario_insert = "INSERT INTO ".$nombre_tabla."(nombre, pts_acumulados, total_goles, fecha_registro)
VALUES (:nombre, :pts_acumulados, :total_goles, :fecha_registro) ";

try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_usuario_insert);

    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okInsercion = $agenteSQL->execute(
                            array(
                                  ':nombre' => $nombre,
                                  ':pts_acumulados' => 0,
                                  ':total_goles' => 0,
                                  ':fecha_registro' => $fecha_registro
                                ));
    $resultadoSQL = null;
     header("Location: main_admin.php#listar_equipos");

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