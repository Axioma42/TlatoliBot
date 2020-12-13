<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') { //solo ingreso a este bloque de código si el método con el que solicita la página es GET
	$validation_code = $_GET['validation_code'];
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());
    mysqli_query($link, "SET NAMES 'utf8'");
	$sentencia = "SELECT * FROM Users_temp WHERE validation_code='".$validation_code."'";
	$resultado = mysqli_query($link, $sentencia); 
	if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));

    $fila = mysqli_fetch_array($resultado);
	//Resultado nulo -> no existe el codigo
    if(mysqli_num_rows($resultado)==0){
		mysqli_close($link);
        echo '<script>alert("La liga de validación ha expirado.")
                self.location = "../login/register.html"</script>';
	}
	//Resultado no nulo -> registra usuario nuevo
    else {
		$_SESSION['logged']=TRUE;
		$_SESSION['username']=$fila['username'];
		$_SESSION['name']=$fila['name'];
		$_SESSION['last']=$fila['last'];
		$_SESSION['lang']=$fila['lang'];
		$_SESSION['join_date']=$fila['join_date'];
		
		$sentencia = "INSERT INTO Users (username, pass, name, last, lang, join_date, forgot_code) VALUES ('".$fila['username']."', '".$fila['pass']."', '".$fila['name']."', '".$fila['last']."', '".$fila['lang']."', '".$fila['join_date']."', NULL)";
		$resultado = mysqli_query($link, $sentencia); 
    	if(!$resultado)
        	die("Error en la sentencia ".mysqli_error($link));
		$sentencia = "DELETE FROM Users_temp WHERE Users_temp.validation_code = '".$validation_code."'";
		$resultado = mysqli_query($link, $sentencia); 
    	if(!$resultado)
        	die("Error en la sentencia ".mysqli_error($link));
		mysqli_close($link);
		
		echo '<script>alert("Registro completado y correo validado.")
                self.location = "../index.html"</script>';
	}
}

?>