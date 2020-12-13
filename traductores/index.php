<?php
session_start();

if(isset($_SESSION['logged']) and ($_SESSION['logged'])){

	//Elige una frase aleatoria que no haya sido traducida
	require("datosConexion.php");
    //Conexión a la BD
	if(!($link = mysqli_connect($db_host, $db_user, $db_pass, $db_name)))
        printf("Error: %s", mysqli_connect_error());

    mysqli_query($link, "SET NAMES 'utf8'");
	$aleat = rand(0,125429);
	$sentencia = "SELECT espanol FROM Corpus WHERE id=".$aleat;
	$resultado = mysqli_query($link, $sentencia);
	if(!$resultado) 
        die("Error en la sentencia ".mysqli_error($link));
	$fila = mysqli_fetch_array($resultado);
	mysqli_free_result($resultado);
	mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Traducciones Tlatolibot</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">TLATOLIBOT</a>
      <a class="btn btn-primary" href="#">Cerrar Sesión</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">¿Cómo traducirías la siguiente frase?</h1>
        </div>
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-5"> <i><?php echo($fila['espanol']);?></i> </h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="post" action="php/send_translation.php">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" name="trans" class="form-control form-control-lg" placeholder="Introduce tu respuesta...">
              </div>
				<div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="hidden" name="id" value="<?php echo($aleat);?>">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Una Plataforma Eficiente</h3>
            <p class="lead mb-0">Esta plataforma habilita la posibilidad de ingresar miles de traducciones de forma <b>colaborativa</b>. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Un Diccionario Robusto</h3>
            <p class="lead mb-0">Todas las traducciones ingresadas crearán un <b>Diccionario Digital</b>, el cual permitirá al <b>Intérprete Digital</b> aprender a traducir entre el <b>Náhuatl</b> y el <b>Español</b> de forma precisa.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Tu Intérprete de Bolsillo</h3>
            <p class="lead mb-0">Una vez que el programa esté listo, este <b>será el primero en su tipo</b> capaz de traducir entre el Náhuatl y el Español, con una <b>exactitud</b> nunca antes lograda.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <!-- <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">¿Aún no te has registrado? ¡Hazlo aquí!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Ingresa tu email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">¡Regístrate!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <!-- <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul> -->
          <p class="text-muted small mb-4 mb-lg-0">&copy; Tlatolibot 2020 - Todos los derechos reservados</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="https://www.facebook.com/Tlatolibot">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <!-- <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li> -->
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
}
else{echo '<script>alert("Inicie sesión para ingresar al portal de traductores")
	self.location = "traductores/login/login.html"</script>';
	}