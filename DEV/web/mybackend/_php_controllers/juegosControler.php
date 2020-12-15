<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - Tables Data
$fileLink = "../../_data/tb_data.php"; 
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - General SETs
$fileLink = "_php_controllers/_generalSet.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - DB conection & work
$fileLink = "_php_librarys/_db.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - Entity functions
$fileLink = "_php_librarys/_functions_generic.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //


// - - - - - VARS //
$theResult = "";
$entityKey = "juego";
$includeString = "juegos_list.php";
$includeChange = "juegos_form.php";
$retu = "";


// - - - - - - - - - - include controler Base
include( "_baseControler.php" );


?>