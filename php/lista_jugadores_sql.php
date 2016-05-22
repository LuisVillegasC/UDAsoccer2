<?php 

include('conexionBD.php');


$nombre_tabla = 'jugador';
$query_jugador_select = "J.nombre, J.paterno, J.materno, J.ci, J.semestre, J.carrera, J.fecha_nacimiento,E.nombre as nombre_equipo FROM jugador J, equipo E WHERE J.id_equipo = E.id_equipo ";

echo "<br>".$query_jugador_select;

try {

    /* Ejecutar una sentencia preparada proporcionando un array de valores de inserción */
    $agenteSQL = $conexionAlServidorBD->prepare($query_jugador_select);
    //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
    $okSelect = $agenteSQL->execute();
    $jugadores = $agenteSQL->fetchAll(PDO::FETCH_ASSOC);

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