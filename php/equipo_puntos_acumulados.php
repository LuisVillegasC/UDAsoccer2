<?php

include('conexionBD.php');


$nombre_tabla_1      = 'equipo';
$query_equipo_select = "SELECT id_equipo, nombre FROM " . $nombre_tabla_1;

$nombre_tabla_2       = 'partido';
$query_partido_select = "SELECT fecha_torneo, nombre_equipo_1, nombre_equipo_2, nro_goles_equipo_1, nro_goles_equipo_2, resultado, fecha_partido FROM " . $nombre_tabla_2 . " WHERE nombre_equipo_1=:nombre_equipo_1";

// echo "<br>";
// echo "query_equipo_select:" . $query_equipo_select;
echo "<br>";
echo "query_partido_select:" . $query_partido_select;
echo "<br>";


try {
    
    $agenteSQLEquipos = $conexionAlServidorBD->prepare($query_equipo_select);
    $okSelect         = $agenteSQLEquipos->execute();
    $equipos          = $agenteSQLEquipos->fetchAll(PDO::FETCH_ASSOC);
    
       
    if ($equipos) {
        $nro_equipos = count($equipos);
        
        foreach ($equipos as $equipo) {
            $id_equipo       = $equipo['id_equipo'];
            $nombre_equipo_1 = $equipo['nombre'];

            echo "<br>".$id_equipo;
            echo "<br>".$nombre_equipo_1;
            
            $agenteSQLPartidos = $conexionAlServidorBD->prepare($query_partido_select);
            $agenteSQLPartidos->execute(array(
                ':nombre_equipo_1' => $nombre_equipo_1
            ));
            $partidos = $agenteSQLPartidos->fetchAll(PDO::FETCH_ASSOC);
            
            $nro_partidos = count($partidos);
            echo "<br>".$nro_partidos;

            $nombre_tabla_3      = 'equipo';

            if ($partidos) {
                $nro_partidos = count($partidos);
                
                foreach ($partidos as $partido) {
                    $nombre_equipo_1 = $partido['nombre_equipo_1'];
                    $nombre_equipo_2 = $partido['nombre_equipo_2'];
                    $nro_goles_equipo_1 = $partido['nro_goles_equipo_1'];
                    $nro_goles_equipo_2 = $partido['nro_goles_equipo_2'];

                     echo "<br> nro_goles_equipo_1: ".$nro_goles_equipo_1;
                     echo "<br> nro_goles_equipo_2: ".$nro_goles_equipo_2;
                    
                    $resultado               = '';
                    $total_puntos_acumulados = 0;
                    
                    if ($nro_goles_equipo_1 > $nro_goles_equipo_2) {
                        $resultado               = 'gano';
                        echo "<br> Resultado: ".$resultado;
                        $total_puntos_acumulados = $total_puntos_acumulados + 3;

                        $query_update_equipo = "UPDATE " . $nombre_tabla_3 . " SET pts_acumulados=" . $total_puntos_acumulados . " WHERE nombre_equipo_1=:nombre_equipo_1";
                
                        $agenteSQL = $conexionAlServidorBD->prepare($query_update_equipo);
                        
                        //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
                        $okUpdate = $agenteSQL->execute(array(
                            ':nombre_equipo_1' => $nombre_equipo_1
                        ));
                    }else if ($nro_goles_equipo_1 === $nro_goles_equipo_2) {
                        $resultado               = 'empato';
                        echo "<br> Resultado: ".$resultado;
                        $total_puntos_acumulados = $total_puntos_acumulados + 1;

                        //EQUIPO 1
                        $query_update_equipo = "UPDATE " . $nombre_tabla_3 . " SET pts_acumulados=" . $total_puntos_acumulados . " WHERE nombre_equipo_1=:nombre_equipo_1";
                
                        $agenteSQL = $conexionAlServidorBD->prepare($query_update_equipo);
                        
                        //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
                        $okUpdate = $agenteSQL->execute(array(
                            ':nombre_equipo_1' => $nombre_equipo_1
                        ));

                        //EQUIPO 2
                        $query_update_equipo = "UPDATE " . $nombre_tabla_3 . " SET pts_acumulados=" . $total_puntos_acumulados . " WHERE nombre_equipo_2=:nombre_equipo_2";
                
                        $agenteSQL = $conexionAlServidorBD->prepare($query_update_equipo);
                        
                        //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
                        $okUpdate = $agenteSQL->execute(array(
                            ':nombre_equipo_2' => $nombre_equipo_2
                        ));
                    }
                }
                             
                
            } else {
                echo "Error, no hay partidos....";
            }
        }
    } else {
        echo "Error, no hay equipos....";
    }
    
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