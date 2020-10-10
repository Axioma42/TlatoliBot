<?php

//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}

    session_start();


if (!isset($_SESSION['lang']))
	$_SESSION['lang'] = "es";
else if (isset($_GET['lang'])        && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']))
{
	if ($_GET['lang'] == "es")
		$_SESSION['lang'] = "es";
	else if ($_GET['lang']  == "en")
        $_SESSION['lang'] = "en";
        else if ($_GET['lang']  == "ncx")
		$_SESSION['lang'] = "ncx";
}

require_once "lenguajes/" . $_SESSION['lang'] . ".php";


	
?>

<!DOCTYPE HTML>
<html dir="ltr" lang="<?php echo $_SESSION['lang'] ?>" >
    
<head>
    <title><?php echo $lang['title'] ?></title>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $lang['description'] ?>" >
    <meta name="keywords" content="<?php echo $lang['keywords'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mensa Mexico AC">
    <meta name="author" content="Mensa MX SIG MINDS">
    <meta name="author" content="Mensa MX SIG Emprendimiento y Creacion de Proyectos de Negocio">
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

</head>
<body>
  <div class="container-fluid">
  <nav class="navbar navbar-inverse fixed-top">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav">

          <li class="active"><a href="#LinkInicio"><?php echo $lang['MenuInicio'] ?></a></li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $lang['MenuIdioma'] ?><span class="caret"></span></a>
            <ul class="dropdown-menu">                
              <li><a href="index.php?lang=ncx"><?php echo $lang['MenuIdiomaNc'] ?></a></li>
              <li><a href="index.php?lang=en"><?php echo $lang['MenuIdiomaEn'] ?></a></li>
              <li><a href="index.php?lang=es"><?php echo $lang['MenuIdiomaSp'] ?></a></li>              
            </ul>
          </li>          

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $lang['MenuAcerca'] ?><span class="caret"></span></a>
            <ul class="dropdown-menu">                
              <li><a href="#LinkProyecto"><?php echo $lang['MenuProyecto'] ?></a></li>
              <li><a href="#LinkSomos"><?php echo $lang['MenuSomos'] ?></a></li>
              <li><a href="#LinkHistoria"><?php echo $lang['MenuHistoria'] ?></a></li>
              <li><a href="#LinkContacto"><?php echo $lang['MenuContactanos'] ?></a></li>
              <li><a href="#LinkAviso"><?php echo $lang['MenuAviso'] ?></a></li>
            </ul>
          </li>          
          
<!--          <li class="dropdown">-->
<!--            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $lang['MenuAyude'] ?> <span class="caret"></span></a> -->
<!--            <ul class="dropdown-menu">                
<!--              <li><a href="#LinkProyecto"><?php echo $lang['MenuDonar'] ?></a></li> -->
<!--              <li><a href="#"><?php echo $lang['MenuDesarrollar'] ?></a></li> -->
<!--              <li><a href="#"><?php echo $lang['MenuDocumentacion'] ?></a></li> -->              
<!--              <li><a href="#"><?php echo $lang['MenuCorpus'] ?></a></li> -->
<!--            </ul> -->
<!--          </li> -->          
          
        </ul>

      </div>

  </nav>
</div>    
    
    <div id="LinkInicio" style="margin-top: 100px;" align="center">
                    <h1 >TLATOLIBOT.</h1>
                    <p><?php echo $lang['Descripcion'] ?></p>
                    <p><?php echo $lang['slogan'] ?> </p>
    </div>

    <div id="LinkProyecto" style="margin-top: 100px; margin-left: 50px; margin-right: 50px;" align="justify">
                    <h2><?php echo $lang['H2Proyecto'] ?></h2>
                    <h3><?php echo $lang['H3Problema'] ?></h3>
                    <p><?php echo $lang['H3ProblemaDesc'] ?> </p>
                    <h3><?php echo $lang['H3Solucion'] ?></h3>
                    <p><?php echo $lang['H3SolucionDesc'] ?> </p>
                    <h3><?php echo $lang['H3Dispositivo'] ?></h3>
                    <p><?php echo $lang['H3DispositivoDesc'] ?> </p>
                    <h3><?php echo $lang['H3Voz'] ?></h3>
                    <p><?php echo $lang['H3VozDesc'] ?> </p>
                    <h3><?php echo $lang['H3Escalabilidad'] ?></h3>
                    <p><?php echo $lang['H3EscalabilidadDesc'] ?> </p>
                    <h3><?php echo $lang['H3Innovacion'] ?></h3>
                    <p><?php echo $lang['H3InnovacionDesc'] ?> </p>
                    <h3><?php echo $lang['H3Autosuficiencia'] ?></h3>
                    <p><?php echo $lang['H3AutosuficienciaDesc'] ?> </p>
                    <h3><?php echo $lang['H3Colaboracion'] ?></h3>
                    <p><?php echo $lang['H3ColaboracionDesc'] ?> </p>
    </div>

    <div id="LinkSomos" style="margin-top: 100px; margin-left: 50px; margin-right: 50px;" align="justify">
        
        <div >
            <h2 ><?php echo $lang['H2Somos'] ?></h2>
            <h3><?php echo $lang['H3Equipo'] ?></h3>            
            <h4><?php echo $lang['H4EquipoIntro'] ?></h4>            
            <ul class="social-ul">
                <li><?php echo $lang['pEquipo01'] ?></li>
                <li><?php echo $lang['pEquipo02'] ?></li>
                <li><?php echo $lang['pEquipo03'] ?></li>
                <li><?php echo $lang['pEquipo04'] ?></li>
                <li><?php echo $lang['pEquipo05'] ?></li>
                <li><?php echo $lang['pEquipo06'] ?></li>
                <li><?php echo $lang['pEquipo07'] ?></li>
            </ul>


        </div>
    </div>
    
    <div id="LinkHistoria" style="margin-top: 100px; margin-left: 50px; margin-right: 50px;" align="justify">
        
        <div >
            <h2 ><?php echo $lang['H2Historia'] ?></h2>
            <h3><?php echo $lang['H3HistoriaDesc'] ?></h3>
            <p><?php echo $lang['pHistoria01'] ?><br></p>
            <p><?php echo $lang['pHistoria02'] ?><br></p>
            <p><?php echo $lang['pHistoria03'] ?><br></p>
            <p><?php echo $lang['pHistoria04'] ?><br></p>
            <p><?php echo $lang['pHistoria05'] ?><br></p>
                


        </div>
    </div>
    
    <div id="LinkContacto" style="margin-top: 100px; margin-left: 50px; margin-right: 50px;" align="justify">
        
        <h2 ><?php echo $lang['H2Contactenos'] ?></h2>
        <form action="contacto.php" method="post">
            <ul>
                <li>
                    <label for="nombre"><?php echo $lang['forNombreEtiqueta'] ?></label>
                    <input id="nombre" type="text" name="nombre" placeholder="<?php echo $lang['forNombreSugerencia'] ?>" required="" />
                </li>
                <li>
                    <label for="email"><?php echo $lang['forEmailEtiqueta'] ?></label>
                    <input id="email" type="email" name="email" placeholder="<?php echo $lang['forEmailSugerencia'] ?>" required="" />
                </li>
                <li>
                    <label for="mensaje"><?php echo $lang['forMensajeEtiqueta'] ?></label>
                    <textarea id="mensaje" name="mensaje" placeholder="<?php echo $lang['forMensajeSugerencia'] ?>" required=""></textarea>                    
                </li>
                <li>
                    <input id="submit" type="submit" name="submit" value="<?php echo $lang['forEnviarEtiqueta'] ?>" />                    
                </li>
                 
             </ul>
        </form>
        
    </div>
        
    <div id="LinkAviso" style="margin-top: 100px; margin-left: 50px; margin-right: 50px;" align="justify">
                    <h2><?php echo $lang['H2Aviso'] ?></h2>
                    <p><?php echo $lang['pAvisoDesc'] ?> </p>
                    <ol>                        
                        <li><?php echo $lang['AvisoI1'] ?> </li>
                        <li><?php echo $lang['AvisoI2'] ?> </li>
                        <li><?php echo $lang['AvisoI3'] ?> </li>
                        <li><?php echo $lang['AvisoI4'] ?> </li>
                        <li><?php echo $lang['AvisoI5'] ?> </li>
                        <li><?php echo $lang['AvisoI6'] ?> </li>
                        <li><?php echo $lang['AvisoI7'] ?> </li>
                        <li><?php echo $lang['AvisoI8'] ?> </li>
                        <li><?php echo $lang['AvisoI9'] ?> </li>
                        <li><?php echo $lang['AvisoI10'] ?> </li>
                    </ol>
                    
    </div>
                

    
    

<!-- footer -->
    <footer>
        <div class="container-fluid" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;" align="center">
            <p class="copyright">© Mensa México 2020 | Mensa MX: SIG - MINDS | Mensa MX: SIG de Emprendimiento y Creación de Proyectos de Negocio</p>
        </div>
    </footer>
    <!-- end footer -->    
</body>
</html>