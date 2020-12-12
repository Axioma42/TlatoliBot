<?php
	session_start();
	//if(isset($_SESSION['logged']) and (!$_SESSION['logged']))
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());

    mysqli_query($link, "SET NAMES 'utf8'");

    //Recibe los datos del formulario
    $mail = $_POST['mail'];		

    //Query
    $sentencia = "SELECT * FROM Users WHERE username='".$mail."'";
    // Ejecuta la sentencia SQL
    $resultado = mysqli_query($link, $sentencia); 
    if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));
	//Valida si ya existe una cuenta con ese correo
	if(mysqli_num_rows($resultado)>0){
		mysqli_close($link);
		echo '<script>alert("Ya existe una cuenta con ese correo electrónico registrado")
                self.location = "index.html"</script>';
	}
    else {
		//Verifica que la contraseña coincida con la confirmación
		if($_POST['pass']!=$_POST['passConfirm'])
			echo '<script>alert("Las contraseñas no coinciden")
                self.location = "index.html"</script>';
		else {
			//Hash del password
			$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$name = $_POST['name'];
        	$last = $_POST['last'];
			$lang = $_POST['lang'];
			$sentencia = "INSERT INTO Users (username, pass, name, last, lang, join_date) VALUES ('".$mail."', '".$pass."', '".$name."', '".$last."', '".$lang."', CURRENT_TIMESTAMP())";
			$resultado = mysqli_query($link, $sentencia); 
    		if(!$resultado)
        		die("Error en la sentencia ".mysqli_error($link));
			else {
				mysqli_close($link);
				$_SESSION['logged'] = TRUE;
				$_SESSION['user']=$username;
				$_SESSION['mail']=$mail;
        		$_SESSION['name']=$name;
        		$_SESSION['last']=$last;
				$_SESSION['phone']=$phone;
				echo '<script>alert("Registro exitoso")
                self.location = "index.html"</script>';
				}
    		}
		}
	mysqli_free_result($resultado);
	mysqli_close($link);
?>