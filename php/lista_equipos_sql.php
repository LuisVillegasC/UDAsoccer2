<?php 

include('conexionBD.php');


$nombre_tabla = 'equipo';
$query_jugador_select = "SELECT nombre, pts_acumulados, fecha_registro FROM ".$nombre_tabla;

try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_jugador_select);
    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okInsercion = $agenteSQL->execute();
    $equipos = $agenteSQL->fetchAll(PDO::FETCH_ASSOC);

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