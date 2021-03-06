<?php
//abrimos sesion para poder trabajar con las variables de sesion
session_start();
// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'Game Discounts | reComercem: El teu comerç de proximitat al barri';
$pageDescription = '"Game Discounts" let you win discount tickets to use in our stores';
$pageKeywords = 'Game, Discounts, win, discount, tickets, stores, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
// - - - - - - - - - - - - - - - - - - - - ADD CSSs & JSs SCRIPTS
$pageStylesAry = Array( 'games'=>'/css/games.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //


// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");


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

?>

<article id="mainStores" class="artlBox">

    <h1 class="artlTitle">
        <svg id="icon_game" viewBox="0 0 133 110" style="height: 70px; vertical-align: bottom;">
            <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M0,56.29c0,6.87,2.39,13.18,6.37,18.14L1.73,91.89
            C0.03,98.32,6,106.5,13.96,108.66l2.83,0.76c7.96,2.15,17.19-1.93,18.89-8.35l4.96-18.67c4.92-2.33,9.08-6.02,11.98-10.6h26.56
            c3.47,5.47,8.73,9.68,14.94,11.79l4.64,17.48c1.7,6.42,10.93,10.5,18.89,8.35l2.83-0.76c7.96-2.16,13.93-10.34,12.23-16.77
            l-5.36-20.15c2.82-4.47,4.45-9.77,4.45-15.45c0-10.2-5.25-19.16-13.18-24.28v-5.86c0-3.67-2.95-6.65-6.59-6.65H96.22
            c-3.64,0-6.59,2.98-6.59,6.65v0.44H70.3V3.1c0-1.71-1.38-3.1-3.08-3.1c-1.7,0-3.08,1.39-3.08,3.1v23.49H44.81v-0.44
            c0-3.67-2.95-6.65-6.59-6.65H22.41c-3.64,0-6.59,2.98-6.59,6.65v4.35C6.44,35.22,0,45,0,56.29z M23.72,42.77
            c0-1.59,1.28-2.88,2.86-2.88h5.71c1.58,0,2.86,1.29,2.86,2.88v6.43h6.37c1.58,0,2.85,1.29,2.85,2.88v5.76
            c0,1.59-1.27,2.88-2.85,2.88h-6.37v6.43c0,1.59-1.28,2.88-2.86,2.88h-5.71c-1.58,0-2.86-1.29-2.86-2.88v-6.43h-6.37
            c-1.57,0-2.85-1.29-2.85-2.88v-5.76c0-1.59,1.28-2.88,2.85-2.88h6.37V42.77z M96.66,42.99c0-3.18,2.55-5.76,5.71-5.76
            c3.15,0,5.71,2.58,5.71,5.76c0,3.18-2.56,5.76-5.71,5.76C99.21,48.75,96.66,46.17,96.66,42.99z M96.66,65.15
            c0-3.18,2.55-5.76,5.71-5.76c3.15,0,5.71,2.58,5.71,5.76c0,3.18-2.56,5.76-5.71,5.76C99.21,70.91,96.66,68.33,96.66,65.15z
            M91.38,59.83c-3.15,0-5.71-2.58-5.71-5.76c0-3.18,2.56-5.76,5.71-5.76c3.16,0,5.72,2.58,5.72,5.76
            C97.1,57.25,94.54,59.83,91.38,59.83z M113.35,59.83c-3.15,0-5.71-2.58-5.71-5.76c0-3.18,2.56-5.76,5.71-5.76
            c3.16,0,5.71,2.58,5.71,5.76C119.06,57.25,116.51,59.83,113.35,59.83z"/>
        </svg>
        <?=$sectionTitle?>
    </h1>

    <?=((!empty($sectionDescription))?'<p>'.$sectionDescription.'<p/>':'')?>

    <ul class="listGameItemsMain">

        <?php

        // - - - - - - - - - - get Comerc Data

        $EntitiesAry = GetIdedArray( getEntity( "juego", 0, 3 ) );

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 

        if ( !empty( $EntitiesAry ) ) {

            foreach( $EntitiesAry as $theKey => $theData ) {

        ?>

        <a href="/games<?=$theData['url']?>" target="_self">
            <li class="listGameItemContainer" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg)">
                <div class="listGameItemBox">
                    <h2 class="listGameItemTitle"><?=$theData['nombre']?></h2>
                    <p class="listGameItemText"><?=$theData['descripcion']?></p>
                </div>
            </li>
        </a>
        
        <?php 

            }
        }

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat //

        ?>

    </ul>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>