<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array( 'index'=>'/css/index.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

// - - - - - - - - - - - - - - - - - - - - VISTA/FORM PART
if ( !empty( $_REQUEST['idAction'] ) ) { 
    if ( $_REQUEST['idAction'] == 2 ) { include_once("_php_views/ofertas_form.php" ); }
} else { include_once( "_php_views/ofertas_list.php" ); }

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>