<?php

include('conexionBD.php');


$nombre_tabla_1      = 'equipo';
$query_equipo_select = "SELECT id_equipo, nombre FROM " . $nombre_tabla_1;

$nombre_tabla_2       = 'partido';
$query_partidos_local = "SELECT fecha_torneo, nombre_equipo_1, nombre_equipo_2, nro_goles_equipo_1, nro_goles_equipo_2, resultado, fecha_partido FROM " . $nombre_tabla_2 . " WHERE nombre_equipo_1=:nombre_equipo";

$nombre_tabla_2       = 'partido';
$query_partidos_visitante = "SELECT fecha_torneo, nombre_equipo_2, nombre_equipo_1, nro_goles_equipo_2, nro_goles_equipo_1, resultado, fecha_partido FROM " . $nombre_tabla_2 . " WHERE nombre_equipo_2=:nombre_equipo";


try {
    
    $agenteSQLEquipos = $conexionAlServidorBD->prepare($query_equipo_select);
    $okSelect         = $agenteSQLEquipos->execute();
    $equipos          = $agenteSQLEquipos->fetchAll(PDO::FETCH_ASSOC);
    
    
    if ($equipos) {
        $nro_equipos = count($equipos);
        
        foreach ($equipos as $equipo) {
            $id_equipo       = $equipo['id_equipo'];
            $nombre_equipo_1 = $equipo['nombre'];
            
            // Partidos Local
            $agenteSQLPartidosLocal = $conexionAlServidorBD->prepare($query_partidos_local);
            $agenteSQLPartidosLocal->execute(array(
                ':nombre_equipo' => $nombre_equipo_1
            ));
            $partidos_local = $agenteSQLPartidosLocal->fetchAll(PDO::FETCH_ASSOC);
            
            $nro_partidos_local = count($partidos_local);
            //echo "<br>nro_partidos_local:".$nro_partidos_local;

            // Partidos Visitante
            $agenteSQLPartidosVisitante = $conexionAlServidorBD->prepare($query_partidos_visitante);
            $agenteSQLPartidosVisitante->execute(array(
                ':nombre_equipo' => $nombre_equipo_1
            ));
            $partidos_visitante = $agenteSQLPartidosVisitante->fetchAll(PDO::FETCH_ASSOC);
            
            $nro_partidos_visitante = count($partidos_visitante);
            //echo "<br>nro_partidos_visitante:".$nro_partidos_visitante;
            
            
            $nombre_tabla_3 = 'equipo';

            $total_puntos_acumulados = 0;
            

echo "<br>PARTIDOS LOCAL-->".$nombre_equipo_1 ;

           if ($partidos_local) {
                $nro_partidos_local = count($partidos_local);
                
                foreach ($partidos_local as $partido) {
                    $nombre_equipo_local    = $partido['nombre_equipo_1'];
                    $nombre_equipo_visitante    = $partido['nombre_equipo_2'];
                    $nro_goles_equipo_local = $partido['nro_goles_equipo_1'];
                    $nro_goles_equipo_visitante = $partido['nro_goles_equipo_2'];

                    echo "<br>nombre_equipo_local".$nombre_equipo_local;
                    echo "<br>nombre_equipo_visitante".$nombre_equipo_visitante;
                    echo "<br>nro_goles_equipo_local".$nro_goles_equipo_local;
                    echo "<br>nro_goles_equipo_visitante".$nro_goles_equipo_visitante;

                    if ($nro_goles_equipo_local > $nro_goles_equipo_visitante) {
                        $total_puntos_acumulados = $total_puntos_acumulados + 3;


                    }  else if ($nro_goles_equipo_local === $nro_goles_equipo_visitante) {
                        $total_puntos_acumulados = $total_puntos_acumulados + 1;
                    }
                }
                
                
            } 

echo "<br>PARTIDOS VISITANTE-->".$nombre_equipo_1 ;

            if ($partidos_visitante) {
                $nro_partidos_visitante = count($partidos_visitante);
                
                foreach ($partidos_visitante as $partido) {
                    $nombre_equipo_local    = $partido['nombre_equipo_2'];
                    $nombre_equipo_visitante    = $partido['nombre_equipo_1'];
                    $nro_goles_equipo_local = $partido['nro_goles_equipo_2'];
                    $nro_goles_equipo_visitante = $partido['nro_goles_equipo_1'];

                    echo "<br>nombre_equipo_local".$nombre_equipo_local;
                    echo "<br>nombre_equipo_visitante".$nombre_equipo_visitante;
                    echo "<br>nro_goles_equipo_local".$nro_goles_equipo_local;
                    echo "<br>nro_goles_equipo_visitante".$nro_goles_equipo_visitante;

                    if ($nro_goles_equipo_local > $nro_goles_equipo_visitante) {
                        $total_puntos_acumulados = $total_puntos_acumulados + 3;


                    } else if ($nro_goles_equipo_local === $nro_goles_equipo_visitante) {
                        $total_puntos_acumulados = $total_puntos_acumulados + 1;
                    }
                }
                
                
            } 
            echo "<br>pts=".$total_puntos_acumulados;
            // Actualizar puntos ganados
            $query_update_equipo = "UPDATE " . $nombre_tabla_3 . " SET pts_acumulados=" . $total_puntos_acumulados . " WHERE nombre =:nombre_del_equipo";
            
            $agenteSQL = $conexionAlServidorBD->prepare($query_update_equipo);
            
            //Retorna TRUE si todo fue bien, y FALSE en caso contrario (booleano)
            $okUpdate = $agenteSQL->execute(array(
                ':nombre_del_equipo' => $nombre_equipo_1
            ));

            echo "<br>.................";
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