<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') { //solo ingreso a este bloque de código si el método con el que solicita la página es GET
	$forgot_code = $_GET['forgot_code'];
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());
    mysqli_query($link, "SET NAMES 'utf8'");
	$sentencia = "SELECT * FROM Users WHERE forgot_code='".$forgot_code."'";
	$resultado = mysqli_query($link, $sentencia); 
	if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));

    $fila = mysqli_fetch_array($resultado);
	//Resultado nulo -> no existe el codigo
    if(mysqli_num_rows($resultado)==0){
		mysqli_close($link);
        echo '<script>alert("La liga de recuperación ha expirado.")
                self.location = "../login/forgot.html"</script>';
	}
	//Resultado no nulo -> muestra formulario para ingresar contraseña nueva
    else {
		$_SESSION['logged']=TRUE;
		$_SESSION['username']=$fila['username'];
		$_SESSION['name']=$fila['name'];
		$_SESSION['last']=$fila['last'];
		$_SESSION['lang']=$fila['lang'];
		$_SESSION['join_date']=$fila['join_date'];
		$_SESSION['forgot_code']=$forgot_code;
		header("Location: resetPass.php");
	}
}

?>