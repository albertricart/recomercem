<?php

// - - - - - Inicia session php que genera array asociativo con los datos de sesion
session_start(); 

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'Last Offers | reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'Last Offers let you get the last offers in our stores';
$pageKeywords = 'Last, Offers, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
// - - - - - - - - - - - - - - - - - - - - ADD CSSs & JSs SCRIPTS
$pageStylesAry = Array( 'offers'=>'/css/offers.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
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

<article id="mainGames" class="artlBox">

    <h1 class="artlTitle">
        <svg id="icon_offer2" viewBox="0 0 136 129" style="height: 70px; vertical-align: bottom;">
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M125.514,5.271c5.61,3.02,7.93,9.97,5.27,15.69l-0.29-0.16
            l-15.42,30.75c-0.63,0.6-0.88,1.53-0.56,2.4c0.42,1.16,1.69,1.76,2.84,1.34c0.27-0.1,0.51-0.25,0.71-0.43l0.18,0.1l16.03-32.1
            c3.61-7.65,0.5-16.97-7.01-21c-7.57-4.06-16.86-1.26-20.83,6.29c-3.94,7.5-1.22,16.94,6.13,21.28l0.08-0.16
            c0.56,0.35,1.27,0.44,1.93,0.2c1.15-0.42,1.74-1.69,1.32-2.85c-0.4-1.08-1.52-1.67-2.59-1.42c-4.64-3.51-6.21-9.97-3.47-15.19
            C112.813,4.311,119.813,2.201,125.514,5.271z M0.804,63.48l20.64,56.69c2.42,6.66,9.58,10.17,15.99,7.84l71.71-26.1
            c4.16-1.52,6.98-5.13,7.78-9.3l18.24-38.18c2.4-5.03-0.51-11.35-6.51-14.37l-4.45,9.25c0.31,0.49,0.58,1.03,0.79,1.6
            c1.61,4.41-0.88,9.37-5.55,11.07c-4.67,1.7-9.76-0.5-11.36-4.91c-1.61-4.42,0.88-9.37,5.55-11.07c0.47-0.17,0.94-0.3,1.41-0.4
            l4.92-9.51l-28.3-12.88c-3.29-2.68-7.77-3.63-11.94-2.11l-71.71,26.1C1.613,49.531-1.617,56.821,0.804,63.48z M23.343,87.381
            c-5.67-15.57,2.36-32.79,17.93-38.45c15.56-5.67,32.78,2.36,38.45,17.93c5.66,15.57-2.36,32.78-17.93,38.45
            S29.003,102.951,23.343,87.381z"/>
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M36.264,60.851c1.4-3,4.97-4.3,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
            c-1.4,3.01-4.97,4.3-7.97,2.9C36.164,67.42,34.863,63.851,36.264,60.851z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M54.034,89c1.4-3.01,4.97-4.31,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
            s-4.97,4.3-7.97,2.9C53.934,95.571,52.633,92,54.034,89z"/>
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M55.244,60.391c0.55-1.19,2.19-1.81,3.35-1.27l0.9,0.42
            c1.16,0.54,1.74,2.2,1.18,3.39l-14.73,31.6c-0.56,1.19-2.2,1.81-3.35,1.27l-0.91-0.43c-1.16-0.53-1.73-2.19-1.18-3.38
            L55.244,60.391z"/></g></g></g>
        </svg>
        <?=$sectionTitle?>
    </h1>

    <?=((!empty($sectionDescription))?'<p>'.$sectionDescription.'<p/>':'')?>

    <ul class="listOfferItemsMain">

        <?php

        // - - - - - - - - - - get Comerc Data
        
        $EntitiesAry = GetIdedArray( getEntity( "oferta", 0, 1, 0, 0 ) );

        $ComerciosAry = GetIdedArray( getEntity( "comerc", 0, 1, 0, 0 ) );

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 

        if ( !empty( $EntitiesAry ) ) {

            foreach( $EntitiesAry as $theKey => $theData ) {

        ?>

        <a href="/search_stores.html?xim=<?=$theData['id_comerc']?>" target="_self">
        <li class="listOfferItemContainer" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg);">">
            <div class="listOfferItemBox">
                <h2 class="listOfferItemTitle"><?=$theData['nombre']?></h2>
                <p class="listOfferItemText"><?=nl2br($theData['descripcion'])?></p>
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