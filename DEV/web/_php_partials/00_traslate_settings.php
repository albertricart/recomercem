<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Set Language =>

$languagesAry = array('esp' => 'Español', 'cat' => 'Català', 'eng' => 'English');

$setLanguage = 'esp';

if ( !empty( $_REQUEST['lx'] ) ) { 

    if ( array_key_exists( $_REQUEST['lx'], $languagesAry ) ) { $setLanguage = $_REQUEST['lx']; }

} else if ( !empty( $_COOKIE['setLanguage'] ) ) { 
    
    $setLanguage = $_COOKIE['setLanguage']; 

} else {

    $setLanguage = 'esp';

}

if ( PHP_VERSION_ID < 70300 ) { 

    $cookieOpts = array (
        'expires' => time() + 60*60*24*7,
        'path' => '/',
        'domain' => '.recomercem.es', // leading dot for compatibility or use subdomain
        'secure' => false,
        'httponly' => false,    // or false
        'samesite' => 'Strict' // None || Lax  || Strict
        );
    setcookie( "setLanguage", $setLanguage, $cookieOpts ); 

} else { 

    // setcookie( "setLanguage", $setLanguage, $cookieOpts['expires'], $cookieOpts['path'], $cookieOpts['domain'], $cookieOpts['secure'], $cookieOpts['httponly'] ); 
    $expiresDate = gmdate('D, d M Y H:i:s', time()+60*60*24*7 ).' GMT';
    header("Set-Cookie: setLanguage=".$setLanguage."; expires=".$expiresDate."; SameSite=Strict");

}

if ( file_exists( "./languages/"."mainmenu_".$setLanguage.".php" ) ) {

    include_once( "./languages/"."mainmenu_".$setLanguage.".php" );

}

if ( file_exists( "./languages/"."login_".$setLanguage.".php" ) ) {

    include_once( "./languages/"."login_".$setLanguage.".php" );

}

$scriptName = explode( '/', $_SERVER['PHP_SELF'] );
$scriptName = explode( '.', $scriptName[count($scriptName)-1] );

if ( file_exists( "./languages/".$scriptName[0]."_".$setLanguage.".php" ) ) {

    include_once( "./languages/".$scriptName[0]."_".$setLanguage.".php" );

} else { echo "<script>console.log('./languages/".$scriptName[0]."_".$setLanguage.".php')</script>"; }





?>