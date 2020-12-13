<?php
session_start();

if(isset($_SESSION['logged']) and ($_SESSION['logged'])){

	//Recibe la frase traducida y la guarda en la base de datos
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());

    mysqli_query($link, "SET NAMES 'utf8'");
	$trans = $_POST['trans'];
	$id = $_POST['id'];
	$sentencia = "UPDATE Corpus SET nahuatl = '".$trans."' WHERE Corpus.id = '".$id."'";
	$resultado = mysqli_query($link, $sentencia);
	if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));
	mysqli_free_result($resultado);
	mysqli_close($link);
	echo '<script>alert("Traducción guardada correctamente.")
	self.location = "../index.php"</script>';
}
?>