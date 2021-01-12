<?php

// - - - - - Inicia session php que genera array asociativo con los datos de sesion
session_start(); $consoleLog = array(); 
if( isset( $_REQUEST['reset'] )) { $_SESSION=array(); $consoleLog[] = "reset session"; }
if( isset( $_REQUEST['ticket'] )) { $_SESSION['user']['ticket']=0; $consoleLog[] = "reset ticket"; }

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
// - - - - - - - - - - - - - - - - - - - - ADD CSSs & JSs SCRIPTS
$pageStylesAry = Array('pages' => '/css/pages.css','summary' => '/css/summary.css'); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');


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

$EntitiesAry = GetIdedArray( getEntity( "juego", 0, 3 ) );


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Session data =>

if ( !empty( $_REQUEST['gameid'] ) ) { $gameId = $_REQUEST['gameid']; $isOK = true; } else { $gameId = 0; $isOK = false; }
if ( !empty( $_REQUEST['finalscore'] ) ) { $finalScore = intval( $_REQUEST['finalscore'] ); } else { $finalScore = 0; }

$sessionAry = array();

$totalPoints = 0;

$pointsToTicket = 500;

$playedGames = 0;

// var_dump($_SESSION); // var_dump($_REQUEST);

// - - - - - Control si existe y rellena de datos
if ( !empty( $_SESSION ) ) {

    // - - - - - Get & Calc data from session
    $sessionAry = $_SESSION;

    if ( !isset( $sessionAry['games'] ) ) {    

        foreach( $EntitiesAry as $theKey => $theData ) { 

            $sessionAry['games'][$theKey]['active'] = false;
            if ( $isOK && $theKey == $gameId ) { $sessionAry['games'][$theKey]['score'] = $finalScore; } 
            else { $sessionAry['games'][$theKey]['score'] = 0; }
    
        }

    }

    if ( $isOK ) {
        $sessionAry['games'][$gameId]['score'] = $finalScore;
        $sessionAry['games'][$gameId]['active'] = true;
    }

    foreach( $sessionAry['games'] as $theKey => $theData ) { 
        $totalPoints += $theData['score']; 
        if ($theData['score']>0) { ++$playedGames; }
    }

    $sessionAry['total'] = $totalPoints;

    $consoleLog[] = "update session";

} else {

    $sessionAry['user']['id'] = "";
    $sessionAry['user']['cid'] = "";
    $sessionAry['user']['name'] = "";
    $sessionAry['user']['email'] = "";
    $sessionAry['user']['ticket'] = 0;

    foreach( $EntitiesAry as $theKey => $theData ) { 

        $sessionAry['games'][$theKey]['active'] = false;
        if ( $isOK && $theKey == $gameId ) { $sessionAry['games'][$theKey]['score'] = $finalScore; } 
        else { $sessionAry['games'][$theKey]['score'] = 0; }

    }

    $sessionAry['total'] = $finalScore;
    $totalPoints = $finalScore;

    if ( $isOK ) { ++$playedGames; }

    $consoleLog[] = "create session";

}

// - - - - - Save session in local
$_SESSION = $sessionAry;

// - - - - - control user
if ( !empty( $sessionAry['user']['name'] ) ) { $loggedUser = true; } else { $loggedUser = false; }

if (!$loggedUser) { 
    
    header('Location: /login.html?hi'); } 

else {

    saveEntity( "usuario", array('puntuacion'=>$totalPoints,'json'=>json_encode($sessionAry['games'])), array('field'=>'email','content'=>"'".$sessionAry['user']['email']."'") );

}

// - - - - - control ticket
if ( $totalPoints >= $pointsToTicket ) { $giveTicket = true; } else { $giveTicket = false; }
if ( $sessionAry['user']['ticket'] != 0 ) { $sendedTicket = true; } else { $sendedTicket = false; }


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Session data //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - TRASLATE BLOCK =>

// - - - - - traslate data
$trsltStringAry = json_decode( $jsonTraslate, true );
$chngStringAry = json_decode( $jsonChange, true );
// - - - - - Array de reemplazo
$replaceStringAry = array( '@@nombre', '@@expresion', '@@juego', '@@puntos', '@@total', '@@jugados', '@@points2ticket' );
// - - - - - expresion
if ( $finalScore == 0 ) { $expresion = $chngStringAry['expresion'][0]; }
elseif ( $finalScore < ( $pointsToTicket * .30 ) ) { $expresion = $chngStringAry['expresion'][1]; }
else { $expresion = $chngStringAry['expresion'][2]; }
// - - - - - obtenido
if ( $finalScore > 0 ) { $trsltStringAry['obtenido'] = $chngStringAry['obtenido']; } 
// - - - - - jugados
if ( $playedGames == count( $sessionAry['games'] ) ) { $trsltStringAry['jugados'] = $chngStringAry['jugados']; }
// - - - - - suficiente
if ( $giveTicket ) { $trsltStringAry['suficiente'] = $chngStringAry['suficiente']; }
// - - - - - enviado
if ( $sendedTicket ) { $trsltStringAry['suficiente'] = $chngStringAry['enviado']; }
// - - - - - replace array
$replaceDataAry = array(
	'@@nombre' => $sessionAry['user']['name'],
	'@@expresion' => $expresion,
	'@@juego' => (($isOK)?$EntitiesAry[$gameId]['nombre']:''),
	'@@puntos' => $finalScore,
	'@@total' => $totalPoints,
	'@@jugados' => $playedGames .'/'. count( $sessionAry['games'] ),
	'@@points2ticket' => $pointsToTicket
);

$trsltStringAry = str_replace( $replaceStringAry, $replaceDataAry, $trsltStringAry );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - TRASLATE BLOCK //


// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

?>
<script>
function getMyTicket( the_obj ) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var objResult = JSON.parse( this.responseText );
            <?=$msgEmailTicket?>
            if (objResult.result==0) { the_obj.style.display = 'none'; }
            alert( msgEmailTicket[objResult.result] );
        }
    };
    xhttp.open("GET", "/getMyTicket.html", true);
    xhttp.send();
}
</script>
<?

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<article id="mainStores" class="artlBox">

    <h1 class="artlTitle">
        <svg id="icon_game" viewBox="0 0 133 110" class="artlTitleIcon">
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

    <? if ( $isOK ) { // Control por ejecucion sin parametros ?> 

    <h1 class="stdSubtitle"><?=(($loggedUser)?$trsltStringAry['hola']." ":'').$trsltStringAry['obtenido']?></h1>

    <? } ?>

    <p class="stdText"><?=$trsltStringAry['almacenado']?></p>

    <p class="stdText"><?=$trsltStringAry['jugados']." ".$trsltStringAry['suficiente']?></p> 

    <?=(($giveTicket && !$sendedTicket )?'<button class="btnGeneral" onclick="getMyTicket(this)">'.$trsltStringAry['getticket'].'</button>':'')?>

    <p class="stdSubtitle"><?=$trsltStringAry['resumen']?><p>
    
    <ul id="gamesListBox">

        <?php   //var_dump( $sessionAry);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 
        $lastState = 1;
        foreach( $EntitiesAry as $theKey => $theData ) {
            
        ?>

        <li class="gamesListItemBox">
            <?=(($lastState)?'<a href="/games'.$theData['url'].'" target="_self">':'')?>
            <span class="gamesListItemImgBg">
                <div class="gamesListItemImg" style="background-image: url(/images/uploaded/<?=$theData['cid']?>.jpg); <?=((!$lastState)?'opacity: .5;':'')?>"></div>
                <?=((!$lastState)?'<svg x="0px" y="0px" width="37px" height="50px" viewBox="0 0 37 50" class="gamesListItemAvailable">
                    <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0,23.71v23.9C0,48.93,8.28,50,18.5,50S37,48.93,37,47.61v-23.9
                    c0-0.64-1.93-1.22-5.09-1.65v1.65c0.1,0.11,0.16,0.23,0.16,0.35c0,0.65-1.52,1.18-3.4,1.18c-1.87,0-3.39-0.53-3.39-1.18
                    c0-0.12,0.06-0.24,0.16-0.35v-2.22c-2.14-0.11-4.49-0.17-6.94-0.17c-2.51,0-4.91,0.06-7.09,0.18v2.21c0.1,0.11,0.15,0.23,0.15,0.35
                    c0,0.65-1.52,1.18-3.39,1.18s-3.39-0.53-3.39-1.18c0-0.12,0.05-0.24,0.15-0.35v-1.63C1.87,22.51,0,23.08,0,23.71z M5.47,23.67
                    c0,0.69,1.21,1.25,2.7,1.25c1.49,0,2.7-0.56,2.7-1.25h0.05V12.15c0-3.05,2.7-5.88,5.6-5.88h3.88c2.9,0,5.59,2.83,5.59,5.88v11.38
                    c-0.01,0.04-0.01,0.09-0.01,0.14c0,0.69,1.2,1.25,2.69,1.25c1.5,0,2.7-0.56,2.7-1.25h0.11V10.15C31.48,4.89,26.82,0,21.81,0H15.1
                    c-5,0-9.66,4.89-9.66,10.15v13.52H5.47z"/>
                </svg>':'')?>
            </span>
            <div class="gamesListItemTextBox">
                <h2 class="stdTitle"><?=$theData['nombre']?></h2>
                <p class="ltlText"><?=$theData['descripcion']?></p>
                <h2 class="stdSubtitle"><?=$sessionAry['games'][$theKey]['score']?> Puntos</h2>
            </div>
            <?=(($lastState)?'</a>':'')?>
        </li>
        
        <?php 

            $lastState = $sessionAry['games'][$theKey]['score'];

        }

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat //

        ?>

    </ul>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

// imprime lista de logs en consola
foreach ( $consoleLog as $tmpData ) { echo '<script>console.log("'.$tmpData.'")</script>'; }
?>