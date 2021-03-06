<?php

// - - - - - Inicia session php que genera array asociativo con los datos de sesion
session_start(); 

// - - - - - - - - - - - - - - - - - - - - PAGE DATA
$pageTitle = 'reComercem: El teu comerç de proximitat al barri';
$pageDescription = 'reComercem: El teu comerç de proximitat al barri';
$pageKeywords = 'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought';
$pageStylesAry = Array(); // example Array('keyname' => '/fullfilepath/filename.css');
$pageScriptsAry = Array(); // example Array('keyname' => '/fullfilepath/filename.js');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

?>

<style>
.itemTitle {
	color: #C71D1A;
	font-family: 'Inter', Arial, Helvetica, sans-serif;
	font-size: 25px;
	margin: 20px 0 0;
	text-align: center;
	min-height: 80px;
}

#prjctGrid { 
    width: 100%; 
    max-width: 1024px; 
    height: auto; 
    margin: 0 auto; 
    padding: 100px 0; 
    display: grid; 
    grid-template-columns: 1fr 1fr 1fr; 
    grid-gap: 50px;
}
 
.prjctItemImage { 
    max-width: 150px; 
    border: dashed 5px var(--colPrimary);
    border-radius: 50%;
    padding: 15px;
}

@media (max-width: 750px) {
    #prjctGrid { 
        grid-template-columns: 1fr 1fr; 
        grid-gap: 50px;
    }

}

@media (max-width: 500px) {
    #prjctGrid { 
        grid-template-columns: 1fr; 
        grid-gap: 0px;
    }

}

</style>

<?php

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

?>

<article id="mainStores" class="artlBox">

    <h1 class="artlTitle">Proyecto reComercem</h1>


<div id="prjctGrid">

    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Modelo%20Relacional%20BD/Model%20Relacional%20BD%20Recomercem.PNG" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_basesdedatos.png" class="prjctItemImage" />
        <h2 class="itemTitle">Base de Datos</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Diagrama%20casos%20de%20uso/Diagrama%20casos%20d'us%20-%20Grup%201.jpeg" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_casosdeuso.png" class="prjctItemImage" />
        <h2 class="itemTitle">Casos de Uso</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Varios/Juegos_Descripcion.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_games.png" class="prjctItemImage" />
        <h2 class="itemTitle">Presentación Juegos</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Mapas%20mentales/grupo/BrainStorm.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_mapamental.png" class="prjctItemImage" />
        <h2 class="itemTitle">Mapa Mental</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Target%20Customer%20Profile/Persona%20profiles.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_persona.png" class="prjctItemImage" />
        <h2 class="itemTitle">Persona Profile</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Varios/Contracte_Constituci%C3%B3_Equip.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/XTremGroup_logo_colPrimary.svg" class="prjctItemImage" />
        <h2 class="itemTitle">Grupo 1 DAW2B</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Varios/Proyecto_Descripcion.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_presentacion.png" class="prjctItemImage" />
        <h2 class="itemTitle">Presentación Proyecto</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Wireframes/WireFrames.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_wireframes.png" class="prjctItemImage" />
        <h2 class="itemTitle">Wireframes</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Paleta%20de%20colores/Paleta_Colores.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_paletacolores.png" class="prjctItemImage" />
        <h2 class="itemTitle">Paleta de Colores</h2>
    </a>
    <a href="https://github.com/albertricart/recomercem/blob/main/Documentacion/Tipograf%C3%ADa/Tipografia%20Recomercem.pdf" target="_blank" style="display: block; text-align: center; padding: 20px;">
        <img src="/images/project_icons/icono_tipografia.png" class="prjctItemImage" />
        <h2 class="itemTitle">Tipografías</h2>
    </a>

</div>

</article>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>