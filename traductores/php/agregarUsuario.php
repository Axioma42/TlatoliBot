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
                self.location = "../login/login.html"</script>';
	}
    else {
		//Verifica que la contraseña coincida con la confirmación
		if($_POST['pass']!=$_POST['passConfirm'])
			echo '<script>alert("Las contraseñas no coinciden")
                self.location = "../login/register.html"</script>';
		else {
			//Genera codigo de validacion
			$validation_code = md5(strval(rand()));
			//Hash del password
			$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$name = $_POST['name'];
        	$last = $_POST['last'];
			$lang = $_POST['lang'];
			$sentencia = "INSERT INTO Users_temp (username, pass, name, last, lang, join_date, validation_code) VALUES ('".$mail."', '".$pass."', '".$name."', '".$last."', '".$lang."', CURRENT_TIMESTAMP(), '".$validation_code."')";
			$resultado = mysqli_query($link, $sentencia); 
    		if(!$resultado)
        		die("Error en la sentencia ".mysqli_error($link));
			else {
				//Envía liga por correo
				mysqli_close($link);
		$origenNombre = 'Tlatolibot.com'; //nombre que visualiza el receptor del email como "origen" del email (es quien envía el email)
		$origenEmail = 'noreply@tlatolibot.com';//email que visualiza el receptor del email como "origen" del email (es quien envía el email)
		$destinatarioEmail = $mail; //destinatario del email, o sea, a quien le estamos enviando el email
		$destinatarioNombre = $name." ".$last;

		$uid = md5(uniqid(time())); //fabrico un ID único que usaré para el "boundary"

		$asuntoEmail = 'Verificación de correo electrónico - Tlatolibot'; //asunto del email

		//cuerpo del email:
		$cuerpoMensaje = "Nombre: ".$destinatarioNombre."\r\n";
		$cuerpoMensaje .= "Correo: ".$destinatarioEmail."\r\n";
		$cuerpoMensaje .= "Ingrese a la siguiente liga o cópiela en su navegador y cambie su contraseña:\r\n";
		$cuerpoMensaje .= "https://www.tlatolibot.com/traductores/php/validar_mail.php?validation_code=".$validation_code."\r\n";
		$cuerpoMensaje .= "Favor de no responder a este correo.";
		//fin cuerpo del email.

		//cabecera del email (forma correcta de codificarla)
		$header = "From: " . $origenNombre . " <" . $origenEmail . ">\r\n";
		$header .= "Reply-To: " . $origenEmail . "\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
		//armado del mensaje y attachment
		$mensaje = "--" . $uid . "\r\n";
		$mensaje .= "Content-type:text/plain; charset=utf-8\r\n";
		$mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$mensaje .= $cuerpoMensaje . "\r\n\r\n";
		$mensaje .= "--" . $uid . "\r\n";
		//$mensaje .= "Content-Type: application/octet-stream; name=\"" . $archivoNombre . "\"\r\n";
		//$mensaje .= "Content-Transfer-Encoding: base64\r\n";
		//$mensaje .= "Content-Disposition: attachment; filename=\"" . $archivoNombre . "\"\r\n\r\n";
		//$mensaje .= $archivo . "\r\n\r\n";
		//$mensaje .= "--" . $uid . "--";
		//envio el email y verifico la respuesta de la función "email" (true o false)
		if (mail($destinatarioEmail, $asuntoEmail, $mensaje, $header)) {
			echo '<script>alert("Se le ha enviado un correo electrónico\nRevise su bandeja de entrada")
					self.location = "../login/login.html"</script>';
		} else {
			echo '<script>alert("Se ha producido un error\nIntente más tarde")
					self.location = "../login/register.html"</script>';
		}

				}
    		}
		}
?>