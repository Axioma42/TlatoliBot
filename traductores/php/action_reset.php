<?php
	session_start();
	if(isset($_SESSION['logged']) and (!$_SESSION['logged']))
	{
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());

    mysqli_query($link, "SET NAMES 'utf8'");

	//Verifica que la contraseña coincida con la confirmación
		if($_POST['pass']!=$_POST['passConfirm']){
			echo '<script>alert("Las contraseñas no coinciden")
                self.location = "../login/resetPass.php"</script>';
			mysqli_close($link);
		}
		else {
			//Hash del password
			$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			if(isset($_SESSION['forgot_code'])){
					$sentencia = "UPDATE Users SET forgot_code = 'NULL', pass = '".$pass."' WHERE Users.forgot_code = '".$_SESSION['forgot_code']."'";
				}
			else{
				$sentencia = "UPDATE Users SET forgot_code = 'NULL', pass = '".$pass."' WHERE Users.username = '".$_SESSION['mail']."'";
			}
			
			$resultado = mysqli_query($link, $sentencia); 
    		if(!$resultado)
        		die("Error en la sentencia ".mysqli_error($link));
			mysqli_close($link);
			echo '<script>alert("Modificación exitosa")
                self.location = "../index.html"</script>';

		}
		mysqli_free_result($resultado);
		mysqli_close($link);
	}
	else{
		echo '<script>alert("Error")
                self.location = "../login/login.html"</script>';
	}
?>