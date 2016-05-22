<?php 
	include('conexionBD.php');

	//Activar las Sesiones en PHP
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$estado_cuenta = "activa";

	$query_condicion_where = " WHERE
                           username = '" . $username . "'
                           and password = '" . $password . "'" . "
                           and estado_cuenta = '" . $estado_cuenta . "'";
	$nombre_tabla = 'usuario';
	$query_usuario_select = "SELECT nombre, paterno, materno, tipo_usuario FROM ".$nombre_tabla. $query_condicion_where;

	try {

	    $nombre = '';
	    $paterno = '';
	    $materno = '';
	    $tipo_usuario = '';


	    foreach ($conexionAlServidorBD->query($query_usuario_select) as $fila) {
	        $nombre = $fila['nombre'];
	        $paterno = $fila['paterno'];
	        $materno = $fila['materno'];
	        $tipo_usuario = $fila['tipo_usuario'];
	    }



	    if (empty($nombre)) {
	        $_SESSION['mensaje_login'] = 'Su cuenta de usuario no existe o no esta activa. Intente iniciar sesion nuevamente';
	        header("Location: index.php");
	    } else {
	        // Inicializar una variable de SESION con valores
	        $_SESSION['username']= $username;
	        $_SESSION['password']= $password;
	        $_SESSION['nombre']= $nombre;
	        $_SESSION['paterno']= $paterno;
	        $_SESSION['materno']= $materno;
	        $_SESSION['tipo_usuario']= $tipo_usuario;


	        if ($tipo_usuario == 'superadmin') {
	        	header("Location: main_superadmin.php");
	        } else if ($tipo_usuario == 'admin') {
	        	header("Location: main_admin.php");
	        } else if ($tipo_usuario == 'jugador') {
	        	header("Location: main_jugador.php");
	        } else {
	        	//header("Location: index.html");
	        }
	        
	       
	    }
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