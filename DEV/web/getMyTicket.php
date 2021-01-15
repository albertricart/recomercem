<?php

// - - - - - Inicia session php que genera array asociativo con los datos de sesion
session_start();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - Tables Data
$fileLink = "../_data/tb_data.php"; 
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - General SETs
$fileLink = "mybackend/_php_controllers/_generalSet.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - DB conection & work
$fileLink = "mybackend/_php_librarys/_db.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - Entity functions
$fileLink = "mybackend/_php_librarys/_functions_generic.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

$EntitiesAry = GetSingleRow( getEntity( "usuario", 0, 0, 0, 1, " WHERE email = '".$_SESSION['user']['email']."'" ) );

$timestamp = time();

$isKO = 0;
if ( empty( $EntitiesAry ) ) { $isKO = 1; }
else if ( $EntitiesAry['puntuacion'] <= 500 ) { $isKO = 2; }
else if ( $EntitiesAry['ticket'] != 0 ) { $isKO = 3; }

if( $isKO == 0 ) {

    $_SESSION['user']['ticket'] = $timestamp;

    // - - - - - genera CID de ticket 
    $cid = $dbTableAry['ticket']['tableCode'].dechex( time() );
    
    // - - - - - graba
    saveEntity( "ticket", array('id'=>0,'cid'=>$cid,'id_comerc'=>0,'id_usuario'=>$EntitiesAry['id'],'fecha_emision'=>$timestamp,'fecha_canje'=>0) );

    // - - - - - graba
    saveEntity( "usuario", array('id'=>$EntitiesAry['id'],'ticket'=>$timestamp));

    // - - - - - envio email()
    $mailfrom = 'ticketdiscount@recomercem.es';
    $mailto = $EntitiesAry['email'];
    if ( file_exists( "./languages/"."emailticket_".$setLanguage.".php" ) ) {
        include_once( "./languages/"."emailticket_".$setLanguage.".php" );
    }
    $mailheaders = 'From: ' . $mailfrom . "\r\n" . 'Reply-To: ' . $mailfrom . "\r\n" . 'XTremGroup - reComerçem: 0.9';
    mail( $mailto, $mailsubject, $mailmenssage, $mailheaders );

}

echo json_encode( array('result'=>$isKO,'register'=>$timestamp) );

?>