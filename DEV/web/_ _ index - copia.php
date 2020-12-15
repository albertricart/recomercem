<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array( 'index'=>'/css/index.css' ); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<div id="mainoptions">

    <div class="optcontainer">
        <div class="optnicon" style="background-image: url(/images/icon_search.svg); "></div>
        <h2 class="optntitle">Search<br />Store</h2>
        <a id="menuStores" href="/search_stores.html" target="_self">
            <button type="button" class="optnbutton">Find</button>
        </a>
        <p class="optntext">Encuentra el comercio de proximidad que necesitas, toda la información por sector, nombre, etiquetas.</p>
    </div>

    <div class="optcontainer">
        <div  class="optnicon" style="background-image: url(/images/icon_games.svg); "></div>
        <h2 class="optntitle">Game<br />Discounts</h2>
        <a id="menuGames" href="/play_games.html" target="_self">
            <button type="button" class="optnbutton">Play</button>
        </a>
        <p class="optntext">Participa, diviértete y gana fantasticos tickets de descuentos en los comercios del barrio</p>
    </div>

    <div class="optcontainer">
        <div class="optnicon" style="background-image: url(/images/icon_offers.svg); "></div>
        <h2 class="optntitle">Last<br />Offers</h2>
        <a id="menuOffers" href="/last_offers.html" target="_self">
            <button type="button" class="optnbutton">View</button>
        </a>
        <p class="optntext">Descubre las últimas ofertas y novedades de los comecios de cercanía</p>
    </div>

</div>

<article id="mainOffers" class="artlBox" style="background-color: #fff;">

    <h1 class="artlTitle" style="background-image: url(/images/icon_offers_white.svg);">Last Offers</h1>

</article>

<article id="mainStores" class="artlBox" style="background-color: #999;">

    <h1 class="artlTitle" style="background-image: url(/images/icon_search_white.svg);">Search Store</h1>

    <ul class="storesBox">
        <li></li>
    </ul>

</article>

<article id="mainGames" class="artlBox" style="background-color: #fff;">

    <h1 class="artlTitle" style="background-image: url(/images/icon_games_white.svg);">Game Discounts</h1>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>