<?php
	session_start();

	if(isset($_SESSION['logged']) and ($_SESSION['logged'])){
        echo '<script>alert("Usuario ya ha iniciado sesión")
                self.location = "../index.html"</script>';
    }

	require("../../Sección_Traducciones/php/datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());

    mysqli_query($link, "SET NAMES 'utf8'");

    //Recibe los datos del formulario
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    //Query
    $sentencia = "SELECT * FROM Users WHERE username='".$mail."'";

    // Ejecuta la sentencia SQL
    $resultado = mysqli_query($link, $sentencia); 

    if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));

    $fila = mysqli_fetch_array($resultado);

    //Resultado nulo -> usuario o correo incorrectos
    if(mysqli_num_rows($resultado)==0){
		mysqli_close($link);
        echo '<script>alert("correo y/o contrase\u00f1a incorrectos")
                self.location = "login.html"</script>';
	}

    //Resultado no nulo -> verifica contraseña
    else {		
		mysqli_free_result($resultado);
		mysqli_close($link);
		//Contraseña correcta
		if(password_verify($pass, $fila['pass'])){
			$_SESSION['logged']=TRUE;
			$_SESSION['username']=$fila['username'];
			$_SESSION['name']=$fila['name'];
			$_SESSION['last']=$fila['last'];
			$_SESSION['lang']=$fila['lang'];
			$_SESSION['join_date']=$fila['join_date'];
			header("Location: ../index.html");
			//Contraseña incorrecta
		}else{
			echo '<script>alert("correo y/o contrase\u00f1a incorrectos")
                self.location = "login.html"</script>';
		}
    	}
	

?>