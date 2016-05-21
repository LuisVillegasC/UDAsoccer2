<?php
  //Activar las Sesiones en PHP
  session_start();
  $username = '';
  $password = '';
  $nombre = '';
  $paterno = '';
  $materno = '';
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
      $nombre_completo_usuario = $nombre.' '.$paterno.' '.$materno;
  }else{
    $_SESSION['mensaje_login'] = 'Su cuenta de usuario no existe o no esta activa. Intente iniciar sesion nuevamente';
    header("Location: index.php");
  }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UDAsoccer</title> <!--Nombre para la pestaña-->

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/estilos.css" rel="stylesheet">

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
                        <a href="#nosotros">Registrar Jugador</a>
                     </li>                     

                     <li class="page-scroll">
                        <a href="#nosotros">Registrar Equipo</a>
                     </li>                     

                     <li class="page-scroll">
                        <a href="#nosotros">Registrar Administradores</a>
                     </li>
                   
                    <li class="page-scroll">
            			<a href="#contact">Contacto</a>
        			</li>
        			<li class="page-scroll">
            			<a href="#contact">
            				<?php echo $nombre_completo_usuario; ?>

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
</body>
</html>