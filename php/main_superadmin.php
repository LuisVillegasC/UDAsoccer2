<?php
    //Activar las Sesiones en PHP
    session_start();
    $username                = '';
    $password                = '';
    $nombre                  = '';
    $paterno                 = '';
    $materno                 = '';
    $nombre_completo_usuario = '';
    
    if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    }
    if (!empty($_SESSION['password'])) {
    $password = $_SESSION['password'];
    }
    if (!empty($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    }
    if (!empty($_SESSION['paterno'])) {
    $paterno = $_SESSION['paterno'];
    }
    if (!empty($_SESSION['materno'])) {
    $materno = $_SESSION['materno'];
    }
    if (!empty($nombre) && !empty($paterno) && !empty($materno)) {
    $nombre_completo_usuario = $nombre . ' ' . $paterno . ' ' . $materno;
    } else {
    $_SESSION['mensaje_login'] = 'Su cuenta de usuario no existe o no esta activa. Intente iniciar sesion nuevamente';
    header("Location: index.php");
    }
    
    include('lista_equipos_sql.php');
    include('lista_jugadores_sql.php');

    include('lista_partidos_sql.php');
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>UDAsoccer</title>
        <!--Nombre para la pestaña-->
        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/estilos.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="page-top" class="index">
        <!-- NAVEGACION -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#inicio">Inicio</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#nosotros">Nosotros</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#registrar_admins">Registrar Admins</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#listar_jugadores">Listar Jugadores</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#registrar_jugador">Registrar Jugador</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#registrar_equipo">Registrar Equipo</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#registrar_partido">Registrar Partido</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#listar_equipos">Listar Equipos</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#listar_partidos">Listar Partidos</a>
                        </li>
                        <li class="page-scroll">
                            <a href="procesar_partidos.php">Procesar Partidos</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Contacto</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">
                            <?php
                                echo $nombre_completo_usuario;
                                ?>
                            </a>
                        </li>
                        <li class="page-scroll">
                            <a href="salir.php">
                            salir                  </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- SECCION DE INICIO-->
        <section class="success" id="inicio">
            <div class="container">
                <div class="row">
                    <h3>Sobre el Campeonato ></h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 ">
                        <p><small> El <strong> campeonato de futbol de la Universidad de Aquino Bolivia</strong> es una propuesta profesional para cualquier equipo de futbol que este en condiciones de participar en un campeonatocon continuidad supervicion constante por el staff de la organizacion. La practica amateur de jugar campeonatos la enmarcamos en una logistica profecionalizada. Cada jugador "SABE" lo que tiene que hacer y nuestro marco deportivo se lo facilita. </small></p>
                    </div>
                    <div class="col-lg-4 ">
                        <p><small> En el campeonato de Futsal que organizamos instalamos un espiritu de competitividad sustentado en el "fair play" o "juego limpio" que la fifa promueve. </small></p>
                        <p><small> Nuestro campeonato esta avalado por estudiantes de la <strong> carrera de Ing. de sistemas.</strong> con años de experiencia que respaldan nuestro campeonatio. </small></p>
                    </div>
                    <div class="col-lg-4">
                        <p><small> Desde el primer momento y hasta la finalizacion del torneo, acompañaremos a los participantes con informacion sobre los partidos a travez de nuestra web, con notas de los encuentros, fotos de los mismos y un seguimiento al finalizar el campeonato quien se lleva el premio a mejor jugador, valla menos vencida, y las demas premiaciones. </small></p>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2 text-right">
                        <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> <strong>Reglamentos</strong> </a>
                        <p><small><em>Clic para descargar PDF</em> </small> </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECCION DE NOSOTROS-->
        <section id="nosotros">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 ">
                        <h3>VISION</h3>
                        <p><small> El es una propuesta profecional para cualquier equipo de futbol que este en condiciones de participar en un campeonatocon continuidad supervicion constante por el staff de la organizacion. La practica amateur de jugar campeonatos la enmarcamos en una logistica profecionalizada. Cada jugador "SABE" lo que tiene que hacer y nuestro marco deportivo se lo facilita. </small></p>
                    </div>
                    <div class="col-lg-9 ">
                        <H3>MISION</H3>
                        <p><small> En el campeonato de Futsal que organizamos instalamos un espiritu de competitividad sustentado en el "fair play" o "juego limpio" que la fifa promueve. </small></p>
                    </div>
                    <div class="col-lg-9">
                        <h3>¿QUIENES SOMOS?</h3>
                        <p><small> BackupDRAL es un grupo de estudiantes de la carrera de "Taller de sistemas", que esta enfocado a realizar un sistema web deportivo, con el fin de cumplir con la espectativa de un buen ing. de sistemas. </small></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECCION DE registrar_equipo--> 
        <section id="registrar_admins">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="name">Registrar Administradores</span>
                        <form class="formulario" action="registrar_admins.php" method="post">
                            
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="input-formulario" />
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="input-formulario" />

                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="input-formulario" />
                            <label for="paterno">Paterno:</label>
                            <input type="text" name="paterno" id="paterno" class="input-formulario" />
                            <label for="materno">Materno:</label>
                            <input type="text" name="materno" id="materno" class="input-formulario" />

                            <input type="submit" value="Registrar"class="boton-formulario">
                            <input type="reset" value="Limpiar"class="boton-formulario">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECCION DE registrar_jugador-->
        <section id="registrar_jugador">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="name">Registrar Jugador</span>
                        <form class="formulario" action="registrar_jugador.php" method="post">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="input-formulario" />
                            <label for="paterno">Paterno:</label>
                            <input type="text" name="paterno" id="paterno" class="input-formulario" />
                            <label for="materno">Materno:</label>
                            <input type="text" name="materno" id="materno" class="input-formulario" />
                            <label for="ci">CI:</label>
                            <input type="text" name="ci" id="ci" class="input-formulario" />
                            <label for="password">Semestre:</label>
                            <input type="text" name="semestre" id="semestre" class="input-formulario" /> 
                            <label for="carrera">Carrera:</label>
                            <input type="text" name="carrera" id="carrera" class="input-formulario" />
                            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="input-formulario" />
                            <?php
                                if ($equipos) {
                                $nro_equipos = count($equipos);
                                ?>
                            <select name="id_equipo">
                                <?php
                                    foreach ($equipos as $row) {
                                    $id_equipo = $row['id_equipo'];
                                    $nombre    = $row['nombre'];
                                    
                                    ?>
                                <option value="<?php echo $id_equipo; ?>">
                                    <?php echo $nombre; ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                            <?php
                                }
                                ?>
                            <input type="submit" value="Registrar"class="boton-formulario">
                            <input type="reset" value="Limpiar"class="boton-formulario">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECCION DE registrar_equipo--> 
        <section id="registrar_equipo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="name">Registrar Equipo</span>
                        <form class="formulario" action="registrar_equipo.php" method="post">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="input-formulario" />
                            <input type="submit" value="Registrar"class="boton-formulario">
                            <input type="reset" value="Limpiar"class="boton-formulario">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="listar_jugadores">
            <?php
             $nro_jugadores = count($jugadores);
                if ($jugadores) {
                $nro_jugadores = count($jugadores);
                ?>
            <h2>Lista de jugadores</h2>
            <h4>(<?php
                echo $nro_jugadores;
                ?> jugadores)</h4>
            <ul>
                <?php
                    foreach ($jugadores as $row) {
                    // $id_usuario        = $row['id_usuario'];
                    // $id_privilegio     = $row['id_privilegio'];
                    $nombre = $row['nombre'];
                    $paterno = $row['paterno'];
                    $materno = $row['materno'];
                    $nombre_completo_jugador = $nombre."  ".$paterno."  ".$materno;
                    $nombre_equipo = $row['nombre_equipo'];
                    ?>
                <li>
                    <span><?php
                        echo $nombre_completo_jugador."     ".$nombre_equipo;
                        ?></span>
                </li>
                <?php
                    }
                    ?>
            </ul>
            <?php
                } else {
                ?>
            <span>No tiene jugadores este equipo.</span>
            <?php
                }
                $resultadoSQL = null;
                ?>
        </section>
        <section id="listar_equipos">
            <?php
                if ($equipos) {
                $nro_equipos = count($equipos);
                ?>
            <h2>Lista de equipos</h2>
            <ul>
                <h4>(<?php
                    echo $nro_equipos;
                    ?> equipos)</h4>
                <?php
                    foreach ($equipos as $row) {
                    // $id_usuario        = $row['id_usuario'];
                    // $id_privilegio     = $row['id_privilegio'];
                    $id_equipo = $row['id_equipo'];
                    $nombre    = $row['nombre'];
                    $pts_acumulados    = $row['pts_acumulados'];
                    ?>
                <li>
                    <span><?php
                        echo $id_equipo;
                        ?></span>
                    <span><?php
                        echo $nombre;
                        ?></span>
                    <span><?php
                        echo $pts_acumulados;
                        ?></span>
                </li>
                <ul>
                    <?php
                        include('lista_jugadores_por_equipo_sql.php');
                        if ($jugadores_por_equipo) {
                            foreach ($jugadores_por_equipo as $jugador) {

                                    
                                $nombre = $jugador['nombre'];
                                $paterno = $jugador['paterno'];
                                $materno = $jugador['materno'];
                                $nombre_completo_jugador = $nombre."  ".$paterno."  ".$materno;
                        
                        ?>
                    <li>
                        <span><?php
                            echo $nombre_completo_jugador;
                            ?></span>
                    </li>
                    <?php
                        }
                        ?>
                    <?php
                        } else {
                        ?>
                    <span>No tiene jugadores este equipo.</span>
                    <?php
                        }
                        
                        
                        ?>
                    </li>
                </ul>
            </ul>
            <?php
                }
                ?>
            <?php
                } else {
                ?>
            <span>No tiene privilegios este usuario.</span>
            <?php
                }
                $resultadoSQL = null;
                ?>
        </section>
        <section id="listar_partidos">
            <?php
                if ($partidos) {
                $nro_partidos = count($partidos);
                ?>
            <h2>Lista de partidos</h2>
            <h4>(<?php
                echo $nro_partidos;
                ?> partidos)</h4>
            <table border="1">
                <thead>
                    <tr>
                        <th>fecha_partido</th>
                        <th>fecha_torneo</th>
                        <th>nombre_equipo_1</th>
                        <th>nombre_equipo_2</th>
                        <th>nro_goles_equipo_1</th>
                        <th>nro_goles_equipo_2</th>
                        <th>resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($partidos as $partido) {
                        // $id_usuario        = $row['id_usuario'];
                        // $id_privilegio     = $row['id_privilegio'];
                        $fecha_torneo = $partido['fecha_torneo'];
                        $nombre_equipo_1 = $partido['nombre_equipo_1'];
                        $nombre_equipo_2 = $partido['nombre_equipo_2'];
                        $nro_goles_equipo_1 = $partido['nro_goles_equipo_1'];
                        $nro_goles_equipo_2 = $partido['nro_goles_equipo_2'];
                        $resultado = $partido['resultado'];
                        $fecha_partido = $partido['fecha_partido'];
                        ?>
                    <tr>
                        <td><?php echo $fecha_partido; ?></td>
                        <td><?php echo $fecha_torneo; ?></td>
                        <td><?php echo $nombre_equipo_1; ?></td>
                        <td><?php echo $nombre_equipo_2; ?></td>
                        <td><?php echo $nro_goles_equipo_1; ?></td>
                        <td><?php echo $nro_goles_equipo_2; ?></td>
                        <td><?php echo $resultado; ?></td>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
            <?php
                } else {
                ?>
            <span>No hay ningun partido por listar.</span>
            <?php
                }
                $resultadoSQL = null;
                ?>
        </section>
        <!-- SECCION DE registrar_partido--> 
        <section id="registrar_partido">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="name">Registrar Partido</span>
                        <form class="formulario" action="registrar_partido.php" method="post">
                            <label for="nombre">Equipo 1:</label>
                            <?php
                                if ($equipos) {
                                $nro_equipos = count($equipos);
                                ?>
                            <select name="nombre_equipo_1">
                                <?php
                                    foreach ($equipos as $row) {
                                    $id_equipo = $row['id_equipo'];
                                    $nombre    = $row['nombre'];
                                    
                                    ?>
                                <option value="<?php echo $nombre; ?>">
                                    <?php echo $nombre; ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                            <?php
                                }
                                ?>
                            <label for="nro_goles_equipo_1">nro_goles_equipo_1:</label>
                            <input type="text" name="nro_goles_equipo_1" id="nro_goles_equipo_1" />
                            <label for="nombre">Equipo 2:</label>
                            <?php
                                if ($equipos) {
                                $nro_equipos = count($equipos);
                                ?>
                            <select name="nombre_equipo_2">
                                <?php
                                    foreach ($equipos as $row) {
                                    $id_equipo = $row['id_equipo'];
                                    $nombre    = $row['nombre'];
                                    
                                    ?>
                                <option value="<?php echo $nombre; ?>">
                                    <?php echo $nombre; ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                            <?php
                                }
                                ?>
                            <label for="nro_goles_equipo_2">nro_goles_equipo_1:</label>
                            <input type="text" name="nro_goles_equipo_2" id="nro_goles_equipo_2 " />
                            <label for="fecha_torneo">Nº fecha torneo:</label>
                            <input type="text" name="fecha_torneo" id="fecha_torneo" />
                            <input type="submit" value="Registrar"class="boton-formulario">
                            <input type="reset" value="Limpiar"class="boton-formulario">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>