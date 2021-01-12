<?php

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = "Ticket Exchange | reComercem: El teu comerç de proximitat al barri";
$pageDescription = "'Ticket Exchange' let you exchange Discount ticket in you store";
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

?>
<style>
.buttonBtn {
    height: auto;
    margin: 20px 0;
    padding: 8px;
    border: 1px solid var(--colPrimary);
    border-radius: 5px;
    color: var(--colWhite);
    background-color: var(--colPrimary);
    font-family: "Inter", sans-serif;
    outline: none;
    transition: all 0.3s ease;
    font-size: medium;
    cursor: pointer;
}
</style>
<?

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

    <h1 class="artlTitle">Canje de Ticket de Descuento</h1>

    <?

    $showForm = true;

    if ( !empty($_REQUEST["ticket"]) && !empty($_REQUEST["comercio"]) ) {
        // busca ticket y comercio
        $TicketRow = GetSingleRow( getEntity( "ticket", 0, 0, 0, 1, " WHERE cid = '".$_REQUEST["ticket"]."'" ) );
        $StoreRow = GetSingleRow( getEntity( "comerc", 0, 0, 0, 1, " WHERE email = '".$_REQUEST["comercio"]."'" ) );
        // si correcto
        $isOK = true;
        $resultMessage = "";
        if ( empty( $TicketRow['id'] ) ) { $isOK = false; $resultMessage = "Ticket no hallado !"; }
        if ( ( time() - $TicketRow['fecha_emision'] ) > 604800 ) { $isOK = false; $resultMessage = "Fecha de canje excedida !"; }
        if ( $TicketRow['fecha_canje'] != 0 ) { $isOK = false; $resultMessage = "Ticket ya canjeado !"; }
        if ( empty( $StoreRow['id'] ) ) { $isOK = false; $resultMessage = "Comercio no hallado !"; }
        if ( $isOK ) { 
            echo '<a href="ticket.html?exchange='.$TicketRow['id'].'@'.$StoreRow['id'].'@'.$TicketRow['id_usuario'].'" target="_self"><button class="buttonBtn">Canjear Ticket de Descuento</button></a>';
            $showForm = false;
         }
        
    } else if ( !empty($_REQUEST["exchange"]) ) {

        list( $ticketId, $comercioId, $userId ) = explode( '@', $_REQUEST["exchange"] );
        $ticketId = strval($ticketId); 
        $comercioId = strval($comercioId); 
        $userId = strval($userId);

        if ( $ticketId != 0 && $comercioId != 0 && $userId != 0 ) {

            // almacena datos
            $isError = saveEntity( "ticket", array('id'=>$ticketId,'id_comerc'=>$comercioId,'fecha_canje'=>time()) );
            // si correcto
            if ( !$isError ) { $showForm = false; $resultMessage = "El Ticket se ha registrado como canjeado en el comercio ... Muchas gracias !"; }

        }

    }

    if ( !empty( $resultMessage ) ) { echo '<p>'.$resultMessage.'</p>'; }

    if ( $showForm ) {
 
    ?>

    <p>Inserte la informacion solicitada y se confirmará la validez del Ticket de Descuento permitiendo el canje del mismo con un botón de "Canjear"<p/>

    <form action="/ticket.html" method="POST" target="_self" id="ticketForm">
        <input id="ticket" name="ticket" type="text" class="searchFormInput" placeholder="codigo de ticket" />
        <input id="comercio" name="comercio" type="text" class="searchFormInput" placeholder="email comercio" />
        <button id="ticketFormBtn" class="buttonBtn" onclick="document.getElementById('ticketForm').submit()">Validar</button>
    </form>

    <?

    }


    ?>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>