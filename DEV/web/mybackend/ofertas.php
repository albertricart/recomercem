<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array( 'index'=>'/css/index.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');
$mainTitle = "Gestión de Ofertas";
$enableNew = true;

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

// - - - - - - - - - - - - - - - - - - - - VISTA/FORM PART
if ( file_exists( "_php_controllers/ofertasControler.php" ) ) { include_once("_php_controllers/ofertasControler.php" ); } 
else { echo "Error: not exists _php_controllers/ofertasControler.php (".getcwd().")"; }

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>