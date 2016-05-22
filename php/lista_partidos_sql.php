<?php 

include('conexionBD.php');


$nombre_tabla = 'partido';
$query_partido_select = "SELECT fecha_torneo, nombre_equipo_1, nombre_equipo_2, nro_goles_equipo_1, nro_goles_equipo_2, resultado, fecha_partido FROM ".$nombre_tabla;


try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_partido_select);
    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okSelect = $agenteSQL->execute();
    $partidos = $agenteSQL->fetchAll(PDO::FETCH_ASSOC);

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