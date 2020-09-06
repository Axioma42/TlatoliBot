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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="<?php echo $lang['description'] ?>" >
    <meta name="keywords" content="<?php echo $lang['keywords'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <li><a href="#"><?php echo $lang['MenuSomos'] ?></a></li>
              <li><a href="#"><?php echo $lang['MenuContactanos'] ?></a></li>              
            </ul>
          </li>          
          
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $lang['MenuAyude'] ?><span class="caret"></span></a>
            <ul class="dropdown-menu">                
              <li><a href="#LinkProyecto"><?php echo $lang['MenuDonar'] ?></a></li>
              <li><a href="#"><?php echo $lang['MenuDesarrollar'] ?></a></li>
              <li><a href="#"><?php echo $lang['MenuDocumentacion'] ?></a></li>              
              <li><a href="#"><?php echo $lang['MenuCorpus'] ?></a></li>
            </ul>
          </li>          
          
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

                

    
    

    
</body>
</html>