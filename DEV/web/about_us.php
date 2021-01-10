<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'Game Discounts | reComercem: El teu comerç de proximitat al barri';
$pageDescription = '"Game Discounts" let you win discount tickets to use in our stores';
$pageKeywords = 'Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
// - - - - - - - - - - - - - - - - - - - - ADD CSSs & JSs SCRIPTS
$pageStylesAry = Array('about_us' => '/css/about_us.css'); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

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

    <div class="all">
        <div class="persona">
            <img src="/images/bitmojiAlbert.png" alt="bitmojiAlbert">
        </div>

        <div class="persona">
            <img src="/images/bitmojiMarcelo.png" alt="bitmojiMarcelo">
        </div>

        <div class="persona">
            <img src="/images/bitmojiMario.png" alt="bitmojiAlbert">
        </div>
    </div>
    <div class="nombres">
        <p class="nombre">Albert Ricart</p>
        <p class="nombre">Marcelo Goncevatt</p>
        <p class="nombre">Mario De La Torre</p>
    </div>

    <div class="text">
    
        <p><?=$grupoXtremText?></p><br>

        <p><?=$aboutRecomercemText?></p><br>

        <p><?=$aboutAlbertText?></p><br>

        <p><?=$abourMarceloText?></p><br>
        
        <p><?=$abourMarioText?></p>

    </div>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>