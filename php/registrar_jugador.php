<?php
include('conexionBD.php');

//Activar las Sesiones en PHP
session_start();

//LOGIN solo cuentas 'ACTIVAS'
$estado_cuenta = 'activa';

$id_equipo = $_POST['id_equipo'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno =  $_POST['materno'];
$ci =  $_POST['ci'];
$semestre =  $_POST['semestre'];
$carrera =  $_POST['carrera'];
$fecha_nacimiento =  $_POST['fecha_nacimiento'];
$estado_cuenta =  "activa";


$nombre_tabla = 'jugador';
$query_usuario_insert = "INSERT INTO ".$nombre_tabla."(id_equipo, nombre, paterno, materno, ci, semestre, carrera, fecha_nacimiento)
VALUES (:id_equipo, :nombre, :paterno, :materno, :ci, :semestre, :carrera, :fecha_nacimiento) ";

try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_usuario_insert);

    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okInsercion = $agenteSQL->execute(
                            array(
                                  ':id_equipo' => $id_equipo,
                                  ':nombre' => $nombre,
                                  ':paterno' => $paterno,
                                  ':materno' => $materno,
                                  ':ci' => $ci,
                                  ':semestre' => $semestre,
                                  ':carrera' => $carrera,
                                  ':fecha_nacimiento' => $fecha_nacimiento
                                ));


       header("Location: main_admin.php#listar_jugadores");
   
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