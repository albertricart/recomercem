<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array( 'index'=>'/css/index.css', 'searchform'=>'/css/search_form.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<div id="mainoptions">

    <div class="optcontainer">
        <div class="optnicon">
        
            <svg id="icon_search" viewBox="0 0 145 156" style="width: 90%;" class="indexicons">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M34.719,62.879v37.75c0,3.85,1.5,5.37,5.31,5.37h39.41v-33.93
            	h21.25v33.93h0.28c3.81,0,5.31-1.52,5.31-5.37v-37.75l3.83,0.7c1.68,0,2.25-1.09,1.67-3.08l-5.27-15.51
            	c-0.18-0.61-0.44-1.11-0.79-1.48v-3.54c0-1.64-1.32-2.97-2.94-2.97h-65.68c-1.62,0-2.94,1.33-2.94,2.97v5.94l0.01,0.16l-4.95,14.43
            	c-0.58,1.99-0.01,3.08,1.67,3.08L34.719,62.879z M39.749,72.069h36.9v29.97h-36.9V72.069z M66.029,45.479h8.94v13.88
            	c0,2.33-2,4.22-4.47,4.22s-4.47-1.89-4.47-4.22V45.479z M79.999,45.479h8.95l1.67,13.88c0,2.33-2,4.22-4.47,4.22
            	c-2.47,0-4.47-1.89-4.47-4.22L79.999,45.479z M92.859,45.479h8.95l3.35,13.88c0,2.33-2,4.22-4.47,4.22c-2.47,0-4.48-1.89-4.48-4.22
            	L92.859,45.479z M60.439,45.479l-1.68,13.88c0,2.33-2,4.22-4.47,4.22c-2.47,0-4.47-1.89-4.47-4.22l1.67-13.88H60.439z
            	 M47.579,45.479l-3.35,13.88c0,2.33-2.01,4.22-4.48,4.22s-4.47-1.89-4.47-4.22l3.36-13.88H47.579z"/>
                <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M15.049,124.459c0.41,0.41,0.84,0.82,1.27,1.22
            	c0.4,0.43,0.81,0.86,1.22,1.27c21.57,21.57,59.4,19.5,88.78-3.32c-1.43-1.44-2.32-3.43-2.32-5.63c0-4.42,3.58-8,8-8
            	c2.45,0,4.64,1.1,6.1,2.83c27.9-30.08,32.05-72.09,8.85-95.29c-0.41-0.41-0.84-0.82-1.27-1.22c-0.4-0.43-0.81-0.86-1.22-1.27
            	c-23.9-23.9-67.77-18.78-97.98,11.43S-8.851,100.559,15.049,124.459z M17.019,124.979c-16.26-24.8-9.38-63.01,17.78-90.18
            	c27.17-27.16,65.38-34.04,90.18-17.78c16.26,24.8,9.38,63.01-17.78,90.18C80.029,134.359,41.819,141.239,17.019,124.979z
            	 M107.819,120.859l26.68,32.21c0.39,0.47,0.91,0.77,1.46,0.88c0.91,1.24,2.38,2.05,4.04,2.05c2.76,0,5-2.24,5-5
            	c0-1.79-0.94-3.36-2.35-4.25c-0.07-0.11-0.16-0.23-0.25-0.34l-26.9-32.48c-0.38-0.46-0.88-0.75-1.42-0.87
            	c-0.85-0.66-1.92-1.06-3.08-1.06c-2.76,0-5,2.24-5,5C105.999,118.559,106.709,119.949,107.819,120.859z"/>
            </svg>
        </div>
        <h2 class="optntitle">Search<br />Store</h2>
        <a id="menuStores" href="/search_stores.html" target="_self">
            <button type="button" class="optnbutton">Find</button>
        </a>
        <p class="optntext">Encuentra el comercio de proximidad que necesitas, toda la información por sector, nombre, etiquetas.</p>
    </div>

    <div class="optcontainer">
        <div  class="optnicon">
            <svg id="icon_game" viewBox="0 0 133 110" class="indexicons">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M0,56.29c0,6.87,2.39,13.18,6.37,18.14L1.73,91.89
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
        </div>
        <h2 class="optntitle">Game<br />Discounts</h2>
        <a id="menuGames" href="/play_games.html" target="_self">
            <button type="button" class="optnbutton">Play</button>
        </a>
        <p class="optntext">Participa, diviértete y gana fantasticos tickets de descuentos en los comercios del barrio</p>
    </div>

    <div class="optcontainer">
        <div class="optnicon">
            <svg id="icon_offer" viewBox="0 0 136 129" class="indexicons">
                <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M125.514,5.271c5.61,3.02,7.93,9.97,5.27,15.69l-0.29-0.16
                l-15.42,30.75c-0.63,0.6-0.88,1.53-0.56,2.4c0.42,1.16,1.69,1.76,2.84,1.34c0.27-0.1,0.51-0.25,0.71-0.43l0.18,0.1l16.03-32.1
                c3.61-7.65,0.5-16.97-7.01-21c-7.57-4.06-16.86-1.26-20.83,6.29c-3.94,7.5-1.22,16.94,6.13,21.28l0.08-0.16
                c0.56,0.35,1.27,0.44,1.93,0.2c1.15-0.42,1.74-1.69,1.32-2.85c-0.4-1.08-1.52-1.67-2.59-1.42c-4.64-3.51-6.21-9.97-3.47-15.19
                C112.813,4.311,119.813,2.201,125.514,5.271z M0.804,63.48l20.64,56.69c2.42,6.66,9.58,10.17,15.99,7.84l71.71-26.1
                c4.16-1.52,6.98-5.13,7.78-9.3l18.24-38.18c2.4-5.03-0.51-11.35-6.51-14.37l-4.45,9.25c0.31,0.49,0.58,1.03,0.79,1.6
                c1.61,4.41-0.88,9.37-5.55,11.07c-4.67,1.7-9.76-0.5-11.36-4.91c-1.61-4.42,0.88-9.37,5.55-11.07c0.47-0.17,0.94-0.3,1.41-0.4
                l4.92-9.51l-28.3-12.88c-3.29-2.68-7.77-3.63-11.94-2.11l-71.71,26.1C1.613,49.531-1.617,56.821,0.804,63.48z M23.343,87.381
                c-5.67-15.57,2.36-32.79,17.93-38.45c15.56-5.67,32.78,2.36,38.45,17.93c5.66,15.57-2.36,32.78-17.93,38.45
                S29.003,102.951,23.343,87.381z"/>
                <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M36.264,60.851c1.4-3,4.97-4.3,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
			    c-1.4,3.01-4.97,4.3-7.97,2.9C36.164,67.42,34.863,63.851,36.264,60.851z"/>
                <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M54.034,89c1.4-3.01,4.97-4.31,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
			    s-4.97,4.3-7.97,2.9C53.934,95.571,52.633,92,54.034,89z"/>
                <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colPrimary)" d="M55.244,60.391c0.55-1.19,2.19-1.81,3.35-1.27l0.9,0.42
				c1.16,0.54,1.74,2.2,1.18,3.39l-14.73,31.6c-0.56,1.19-2.2,1.81-3.35,1.27l-0.91-0.43c-1.16-0.53-1.73-2.19-1.18-3.38
                L55.244,60.391z"/></g></g></g>
            </svg>
        </div>
        <h2 class="optntitle">Last<br />Offers</h2>
        <a id="menuOffers" href="/last_offers.html" target="_self">
            <button type="button" class="optnbutton">View</button>
        </a>
        <p class="optntext">Descubre las últimas ofertas y novedades de los comecios de cercanía</p>
    </div>

</div>

<?php

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

<article id="mainSearch" class="artlBox" style="background-color: #fff;">

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
        Search Store
    </h1>

    <form action="/search_stores.html" method="POST" target="_self" id="searchForm">
        <input id="byname" name="byname" type="text" class="searchFormInput" placeholder="Nombre de comercio" value="<?=((!empty($_POST['byname']))?$_POST['byname']:'')?>" />
        <select id="bytype" name="bytype" type="text" class="searchFormInput">
            <option value="0">Tipo de Comercio</option>
            <? $TipoAry = GetIdedArray( getEntity( "tipo_comercio", 0, 1 ) );
            foreach( $TipoAry as $tmpData ) {
            ?><option value="<?=$tmpData['id']; ?>"<?=((!empty($_POST['bytype']) && $_POST['bytype']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['nombre']; ?></option><? 
            } ?>
        </select>
        <input id="bytag" name="bytag" type="text" class="searchFormInput" placeholder="Etiquetas separadas por coma" value="<?=((!empty($_POST['bytag']))?$_POST['bytag']:'')?>" />
        <button id="searchButtonForm" onclick="document.getElementById('searchForm').submit()">Buscar</button>
    </form>

    <ul class="listStoreItemsMain">

        <?php

        // - - - - - - - - - - get Comerc Data
        
        $EntitiesAry = GetIdedArray( getEntity( "comerc", 0, 2, 1, 6 ) );
    
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 

        if ( !empty( $EntitiesAry ) ) {

            foreach( $EntitiesAry as $theKey => $theData ) {

        ?>

        <a href="/search_stores.html?xim=<?=$theData['id']?>" target="_self">
        <li class="listStoreItemContainer" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg);">
            <div class="listStoreItemBox">
                <h2 class="listStoreItemTitle"><?=$theData['nombre']?></h2><? /* <p class="listStoreItemText"><?=$theData['descripcion']?></p> */ ?>
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

<article id="mainGames" class="artlBox" style="background-color: #f7f3f3;">

    <h1 class="artlTitle">
        <svg id="icon_game2" viewBox="0 0 133 110" class="artlTitleIcon">
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
        Game Discounts
    </h1>

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

<article id="mainOffers" class="artlBox" style="background-color: #fff;">

    <h1 class="artlTitle">
        <svg id="icon_offer2" viewBox="0 0 136 129" class="artlTitleIcon">
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M125.514,5.271c5.61,3.02,7.93,9.97,5.27,15.69l-0.29-0.16
            l-15.42,30.75c-0.63,0.6-0.88,1.53-0.56,2.4c0.42,1.16,1.69,1.76,2.84,1.34c0.27-0.1,0.51-0.25,0.71-0.43l0.18,0.1l16.03-32.1
            c3.61-7.65,0.5-16.97-7.01-21c-7.57-4.06-16.86-1.26-20.83,6.29c-3.94,7.5-1.22,16.94,6.13,21.28l0.08-0.16
            c0.56,0.35,1.27,0.44,1.93,0.2c1.15-0.42,1.74-1.69,1.32-2.85c-0.4-1.08-1.52-1.67-2.59-1.42c-4.64-3.51-6.21-9.97-3.47-15.19
            C112.813,4.311,119.813,2.201,125.514,5.271z M0.804,63.48l20.64,56.69c2.42,6.66,9.58,10.17,15.99,7.84l71.71-26.1
            c4.16-1.52,6.98-5.13,7.78-9.3l18.24-38.18c2.4-5.03-0.51-11.35-6.51-14.37l-4.45,9.25c0.31,0.49,0.58,1.03,0.79,1.6
            c1.61,4.41-0.88,9.37-5.55,11.07c-4.67,1.7-9.76-0.5-11.36-4.91c-1.61-4.42,0.88-9.37,5.55-11.07c0.47-0.17,0.94-0.3,1.41-0.4
            l4.92-9.51l-28.3-12.88c-3.29-2.68-7.77-3.63-11.94-2.11l-71.71,26.1C1.613,49.531-1.617,56.821,0.804,63.48z M23.343,87.381
            c-5.67-15.57,2.36-32.79,17.93-38.45c15.56-5.67,32.78,2.36,38.45,17.93c5.66,15.57-2.36,32.78-17.93,38.45
            S29.003,102.951,23.343,87.381z"/>
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M36.264,60.851c1.4-3,4.97-4.3,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
            c-1.4,3.01-4.97,4.3-7.97,2.9C36.164,67.42,34.863,63.851,36.264,60.851z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M54.034,89c1.4-3.01,4.97-4.31,7.98-2.9c3,1.4,4.3,4.97,2.9,7.97
            s-4.97,4.3-7.97,2.9C53.934,95.571,52.633,92,54.034,89z"/>
            <g><path fill-rule="evenodd" clip-rule="evenodd" fill="var(--colSecondary)" d="M55.244,60.391c0.55-1.19,2.19-1.81,3.35-1.27l0.9,0.42
            c1.16,0.54,1.74,2.2,1.18,3.39l-14.73,31.6c-0.56,1.19-2.2,1.81-3.35,1.27l-0.91-0.43c-1.16-0.53-1.73-2.19-1.18-3.38
            L55.244,60.391z"/></g></g></g>
        </svg>
        Last Offers
    </h1>

    <ul class="listOfferItemsMain">

        <?php

        // - - - - - - - - - - get Comerc Data
        
        $EntitiesAry = GetIdedArray( getEntity( "oferta", 0, 0, 0, 0 ) );
    
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