<?php
include('conexionBD.php');

//Activar las Sesiones en PHP
session_start();


$fecha_torneo       = $_POST['fecha_torneo'];
$nombre_equipo_1    = $_POST['nombre_equipo_1'];
$nombre_equipo_2    = $_POST['nombre_equipo_2'];
$nro_goles_equipo_1 = $_POST['nro_goles_equipo_1'];
$nro_goles_equipo_2 = $_POST['nro_goles_equipo_2'];
$fecha_partido      = date("Y").'-'.date("m").'-'.date("d");


$resultado               = '';
$total_puntos_acumulados = 0;

if ($nro_goles_equipo_1 > $nro_goles_equipo_2) {
    $resultado = 'gano';
}

if ($nro_goles_equipo_1 < $nro_goles_equipo_2) {
    $resultado = 'perdio';
}


if ($nro_goles_equipo_1 == $nro_goles_equipo_2) {
    $resultado = 'empato';
}


$nombre_tabla         = 'partido';
$query_partido_insert = "INSERT INTO " . $nombre_tabla . "(fecha_torneo, nombre_equipo_1, nombre_equipo_2, nro_goles_equipo_1, nro_goles_equipo_2, resultado, fecha_partido)
VALUES (:fecha_torneo, :nombre_equipo_1, :nombre_equipo_2, :nro_goles_equipo_1, :nro_goles_equipo_2, :resultado, :fecha_partido) ";


// echo "<br>";
// echo "<br>";
// echo "query_partido_insert:".$query_partido_insert;
// echo "<br>";
// echo "<br>";

try {
    
    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_partido_insert);
    
// echo "<br>-->".$fecha_torneo;
// echo "<br>-->".$nombre_equipo_1;
// echo "<br>-->".$nombre_equipo_2;
// echo "<br>-->".$nro_goles_equipo_1;
// echo "<br>-->".$nro_goles_equipo_2;
// echo "<br>-->".$resultado;
// echo "<br>-->".$fecha_partido;


    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okInsercion = $agenteSQL->execute(array(
        ':fecha_torneo' => $fecha_torneo,
        ':nombre_equipo_1' => $nombre_equipo_1,
        ':nombre_equipo_2' => $nombre_equipo_2,
        ':nro_goles_equipo_1' => $nro_goles_equipo_1,
        ':nro_goles_equipo_2' => $nro_goles_equipo_2,
        ':resultado' => $resultado,
        ':fecha_partido' => $fecha_partido
    ));

    
    if ($okInsercion) {
        header('main_admin.php');
    }else{
        echo "<br>";
        echo "fallo el registro del partido";
    }


    $resultadoSQL = null;
    

    header("Location: main_admin.php#listar_partidos");
    
}
catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "<br/>";
    //Cerrar conexion
    $conexionAlServidorBD = null;
    die();
}
catch (Exception $e) {
    echo "¡Error!: " . $e->getMessage() . "<br/>";
    //Cerrar conexion
    $conexionAlServidorBD = null;
    die();
}

//Cerrar conexion
$conexionAlServidorBD = null;

 
?>