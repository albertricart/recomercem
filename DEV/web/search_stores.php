<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = ' Search Stores | reComercem: El teu comerç de proximitat al barri';
$pageDescription = '"Store Search" let you find the service and products offered need near you';
$pageKeywords = 'Store, Search, Service, find, service, products, offered, near, you, reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array(); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<article id="mainOffers" class="artlBox">

    <h1 class="artlTitle">
        <svg id="icon_search2" viewBox="0 0 145 156" style="height: 70px; vertical-align: bottom;">
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
        Last Offers
    </h1>

    <ul class="storesBox">
        <li></li>
    </ul>

</article>







<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>