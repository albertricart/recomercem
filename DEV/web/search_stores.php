<?php

// - - - - - Inicia session php que genera array asociativo con los datos de sesion
session_start(); 

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = "Search Stores | reComercem: El teu comerç de proximitat al barri";
$pageDescription = "'Store Search' let you find the service and products offered need near you";
$pageKeywords = "Store, Search, Service, find, service, products, offered, near, you, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought";
// - - - - - - - - - - - - - - - - - - - - ADD CSSs & JSs SCRIPTS
$pageStylesAry = Array( 'search'=>'/css/search.css', 'searchform'=>'/css/search_form.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
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

<article id="mainOffers" class="artlBox">

    <h1 class="artlTitle">
        <svg id="icon_search2" viewBox="0 0 145 156" class="artlTitleIcon">
            <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M34.719,62.879v37.75c0,3.85,1.5,5.37,5.31,5.37h39.41v-33.93
            h21.25v33.93h0.28c3.81,0,5.31-1.52,5.31-5.37v-37.75l3.83,0.7c1.68,0,2.25-1.09,1.67-3.08l-5.27-15.51
            c-0.18-0.61-0.44-1.11-0.79-1.48v-3.54c0-1.64-1.32-2.97-2.94-2.97h-65.68c-1.62,0-2.94,1.33-2.94,2.97v5.94l0.01,0.16l-4.95,14.43
            c-0.58,1.99-0.01,3.08,1.67,3.08L34.719,62.879z M39.749,72.069h36.9v29.97h-36.9V72.069z M66.029,45.479h8.94v13.88
            c0,2.33-2,4.22-4.47,4.22s-4.47-1.89-4.47-4.22V45.479z M79.999,45.479h8.95l1.67,13.88c0,2.33-2,4.22-4.47,4.22
            c-2.47,0-4.47-1.89-4.47-4.22L79.999,45.479z M92.859,45.479h8.95l3.35,13.88c0,2.33-2,4.22-4.47,4.22c-2.47,0-4.48-1.89-4.48-4.22
            L92.859,45.479z M60.439,45.479l-1.68,13.88c0,2.33-2,4.22-4.47,4.22c-2.47,0-4.47-1.89-4.47-4.22l1.67-13.88H60.439z
                M47.579,45.479l-3.35,13.88c0,2.33-2.01,4.22-4.48,4.22s-4.47-1.89-4.47-4.22l3.36-13.88H47.579z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M15.049,124.459c0.41,0.41,0.84,0.82,1.27,1.22
            c0.4,0.43,0.81,0.86,1.22,1.27c21.57,21.57,59.4,19.5,88.78-3.32c-1.43-1.44-2.32-3.43-2.32-5.63c0-4.42,3.58-8,8-8
            c2.45,0,4.64,1.1,6.1,2.83c27.9-30.08,32.05-72.09,8.85-95.29c-0.41-0.41-0.84-0.82-1.27-1.22c-0.4-0.43-0.81-0.86-1.22-1.27
            c-23.9-23.9-67.77-18.78-97.98,11.43S-8.851,100.559,15.049,124.459z M17.019,124.979c-16.26-24.8-9.38-63.01,17.78-90.18
            c27.17-27.16,65.38-34.04,90.18-17.78c16.26,24.8,9.38,63.01-17.78,90.18C80.029,134.359,41.819,141.239,17.019,124.979z
                M107.819,120.859l26.68,32.21c0.39,0.47,0.91,0.77,1.46,0.88c0.91,1.24,2.38,2.05,4.04,2.05c2.76,0,5-2.24,5-5
            c0-1.79-0.94-3.36-2.35-4.25c-0.07-0.11-0.16-0.23-0.25-0.34l-26.9-32.48c-0.38-0.46-0.88-0.75-1.42-0.87
            c-0.85-0.66-1.92-1.06-3.08-1.06c-2.76,0-5,2.24-5,5C105.999,118.559,106.709,119.949,107.819,120.859z"/>
        </svg>
        <?=$sectionTitle?>
    </h1>

    <?=((!empty($sectionDescription))?'<p>'.$sectionDescription.'<p/>':'')?>

    <form action="/search_stores.html" method="POST" target="_self" id="searchForm">
        <input id="byname" name="byname" type="text" class="searchFormInput" placeholder="<?=$bynameText?>" value="<?=((!empty($_POST['byname']))?$_POST['byname']:'')?>" />
        <select id="bytype" name="bytype" type="text" class="searchFormInput">
            <option value="0"><?=$bytypeText?></option>
            <? $TipoAry = GetIdedArray( getEntity( "tipo_comercio", 0, 1 ) );
            foreach( $TipoAry as $tmpData ) {
            ?><option value="<?=$tmpData['id']; ?>"<?=((!empty($_POST['bytype']) && $_POST['bytype']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['nombre']; ?></option><? 
            } ?>
        </select>
        <input id="bytag" name="bytag" type="text" class="searchFormInput" placeholder="<?=$bytagText?>" value="<?=((!empty($_POST['bytag']))?$_POST['bytag']:'')?>" />
        <button id="searchButtonForm" onclick="document.getElementById('searchForm').submit()"><?=$searchText?></button>
    </form>

    <?php

    // - - - - - - - - - - get Comerc Data =>

    $the_search = "";
    if (!empty($_POST['byname'])) { $the_search .= ((!empty($the_search))?' AND':' WHERE')." nombre LIKE '%".trim($_POST['byname'])."%'"; }
    if (!empty($_POST['bytype'])) { $the_search .= ((!empty($the_search))?' AND':' WHERE')." tipo = ".trim($_POST['bytype']); }
    $the_tags = "";
    if (!empty($_POST['bytag'])) { 
        $tagsAry = explode( ',', trim($_POST['bytag']));
        foreach( $tagsAry as $tmpData ) { $the_tags .= ((!empty($the_tags))?' AND ':'')." etiquetas LIKE '%".trim($tmpData)."%'"; }
    }
    if(!empty($the_tags)) { $the_search .= ((!empty($the_search))?' AND':' WHERE')." ".$the_tags; }
    //echo '<br><br>'.print_r($_POST, true).'<br><br>';        
    echo '<script>console.log("'.$the_search.'")</script>';

    if (!empty($_REQUEST['xim'])) { $xim=intval($_REQUEST['xim']); } else { $xim=0; }

    $EntitiesAry = GetIdedArray( getEntity( "comerc", $xim, 1, 0, 0, $the_search ) );

    // - - - - - - - - - - get Comerc Data //         

    if ( !empty( $EntitiesAry ) ) {

        if ( $xim != 0 ) {

    ?>

    <img id="storeImage" src="/images/uploaded/<?=$EntitiesAry[$xim]['cid']?>.jpg" />
    <h2 class="storeTitle"><?=$EntitiesAry[$xim]['nombre']?></h2>
    <p class="storeText"><?=$EntitiesAry[$xim]['descripcion']?></p>
    <p class="storeText"><?=$EntitiesAry[$xim]['direccion']?></p>
    <p class="storeText"><?=$EntitiesAry[$xim]['telefono']?></p>
    <p class="storeText"><?=$TipoAry[$EntitiesAry[$xim]['tipo']]['nombre']?></p>
    <p class="storeText"><?=$EntitiesAry[$xim]['etiquetas']?></p>
    <div style="clear: both;"></div>


    <?
        $OffersAry = GetIdedArray( getEntity( "oferta", 0, 1, 0, 0, ' WHERE id_comerc = '.$xim ) );

        if ( !empty( $OffersAry ) ) {

    ?>

    <h2 class="storeSubtitle"><?=$ourOffers?></h2>

    <ul class="listOfferItemsMain">

    <?

            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 

            foreach( $OffersAry as $theKey => $theData ) {

    ?>

        <li class="listOfferItemContainer" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg);">
        
            <div class="listOfferItemBox">
                <h2 class="listOfferItemTitle"><?=$theData['nombre']?></h2>
                <p class="listOfferItemText"><?=nl2br($theData['descripcion'])?></p>
            </div>
        </li>
           
    <?php 

            }
            
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat //

        }

    ?>

    </ul>

    <?

        } else {

    ?>

    <ul class="listStoreItemsMain">


        <?php
                // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 

                foreach( $EntitiesAry as $theKey => $theData ) {

        ?>
    
        <li class="listStoreItemContainer" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg);" onclick="document.getElementById('<?=$theData['cid']?>').submit()">
            <div class="listStoreItemBox">
                <h2 class="listStoreItemTitle"><?=$theData['nombre']?></h2>
            </div>
            <form id="<?=$theData['cid']?>"  href="/search_stores.html?xim=<?=$theData['id']?>" method="POST" target="_self">
                <input type="hidden" name="xim" value="<?=$theData['id']?>" />
                <input type="hidden" name="byname" value="<?=((!empty($_POST['byname']))?$_POST['byname']:'')?>" />
                <input type="hidden" name="bytype" value="<?=((!empty($_POST['bytype']))?$_POST['bytype']:'')?>" />
                <input type="hidden" name="bytag" value="<?=((!empty($_POST['bytag']))?$_POST['bytag']:'')?>" />
            </form>        
        </li>

        <?php 

                }

                // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat //

        ?>

    </ul>

    <?

        }

    }

    ?>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>