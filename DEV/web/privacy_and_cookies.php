<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'Game Discounts | reComercem: El teu comerç de proximitat al barri';
$pageDescription = '"Game Discounts" let you win discount tickets to use in our stores';
$pageKeywords = 'Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array('privacy_and_cookies' => '/css/privacy_and_cookies.css'); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');


// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //


// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<article id="mainStores" class="artlBox">

    <h1 class="artlTitle"><?=$sectionTitle?></h1> 

    <div>
        <h2 class="titulo"><?=$ProteccionDeDatos?></h2>
        <p class="text"><?=$ProteccionDeDatostxt?></p>
        <br>
        <p class="text"><?=$ProteccionDeDatostxt?></p>

        <h2 class="titulo"><?=$Usuarios?></h2>
        <p class="text"><?=$Usuarios?></p>

        <h2 class="titulo"><?=$cookies?></h2>
        <p class="text"><?=$cookiestxt?></p>

        <h2 class="titulo"><?=$cookies2?></h2>
        <p class="text"><?=$cookiestxt2?></p>
    </div>
</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>