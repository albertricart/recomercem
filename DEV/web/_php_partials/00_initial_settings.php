<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Set Language =>

if ( !empty( $_REQUEST['lx'] ) ) { $setLanguage = $_REQUEST['lx']; } 
else if ( !empty( $_COOKIE['setLanguage'] ) ) { $setLanguage = $_COOKIE['setLanguage']; } 
else { $setLanguage = 'esp'; }

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


$scriptName = explode( '/', $_SERVER['PHP_SELF'] );
$scriptName = explode( '.', $scriptName[count($scriptName)-1] );

include_once("./languages/".$scriptName[0]."_".$setLanguage.".php");

?>