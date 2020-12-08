<!DOCTYPE html>
<html lang="es-es" dir="ltr">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find It - reComercem Games - DAW2B - Grupo 1 "Xtrem Group" - Marcelo Goncevatt</title>
<meta name="title" content="Find It - reComercem Games - DAW2B - Grupo 1: Xtrm Group - Marcelo Goncevatt" />
<meta name="description" content="Find It - reComercem Games - DAW2B - Grupo 1: Xtrm Group - Marcelo Goncevatt" />
<meta name="keywords" content="Find It - reComercem Games - DAW2B - Grupo 1: Xtrm Group - Marcelo Goncevatt" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="css/findit.css" rel="stylesheet" type="text/css" />
</head>
<body onLoad="onloadFx()">

<!-- 
- Inicialmente el juego es una busqueda de diferencias que se ha cambiado a un "Donde esta wally"
- Esta idea permite configurar una image cualquiera y definir n areas para identificar elementos de una lista
- Es ideal para promover y realizar publicidad directa para acciones de marketing tipo "ofertas"
- Permitiria variarlos y tambien realizar sets de juegos diferentes
- Permite utilizar imagenes fotograficas en un contexto preparado y/o el uso de graficas creadas al efecto de la promocion
-->

<!-- Define contenedor base negro de ubicacion fija al 100% -->
<div id="BlackLayerBox" style="box-sizing: border-box; position:fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.9); font-family:Arial, Helvetica, sans-serif; font-size:12px;">

		<!-- 
		Define contenedor principal del juego base blanco del juego 90%. 
		Ratio pantalla juego (imagen) 16:9 - Con un max-width: 1280px el height: 720px (1280 / 16 = 80 * 9 = 720) 
		-->
		<div id="MainBox" style="width: 90%; max-width:1024px; height:auto; margin: 10vh auto; padding: 0;">

			<!-- Define barra de control e informacion:
			- Boton de cierre de juego
			- Contador de tipo countdown de 120 segundos que define la cantidad de puntos a asignar -->

			<div id="ControlBox" data-x="1024" data-y="576" data-items="20" data-marksize="30" data-sizextra="9" data-markused="0" data-visibility="0" data-markactive="-1" data-score="0" data-time="1200">
				<button type="button" id="OpenListBtn" class="ControlBtns" onClick="displayBox(this,'thingsListBox',true,'txtContinue','txtPause')">Start Game</button>
				<div id="CounterdownBox">120"</div>
				<button id="EndGameBtn" class="ControlBtns" onClick="finishGame()">Finish Game</button>
				<div id="ScoreBox">0 Points</div>
				<button id="HelpBtn" class="ControlBtns" onClick="displayBox(this,'helpDataBox',true,'txtClose','txtView')">Open Help !!</button>
				<div id="RemainMarkerBox">20 Markers</div>
				<button id="ExitBtn" class="ControlBtns" onClick="displayBox(this,'',false,'','')">Exit Game</button>
			</div>

			<div id="GameLayerBox" style="position: relative; width: 100%; height: auto; background: center no-repeat #EEEBB5 url(images/recomercem_bg.png);">

				<img id="gameImage" src="" style="position:relative; width:100%; height:auto; z-index:10; visibility:hidden;" onClick="setMarker( event, this )" />

				<!-- Marcadores:
				- Box de bordes redondeados y color naranja en los fijadosSi no existe elemento debajo del click, lo crea 
				- Si no existe elemento debajo del click, lo crea 
				- Si existe, se "marca" para identificar el seleccionado (diferenciando color a "turquesa" y sombra ??)
				- Botones desplazar, Fijar y Eliminar marcador
				- Marcadores desplazables de tipo Drag&Drop limitados por los bordes del contenedor (se controla en funcion de drag)
				- -->

				<div id="marker_0" class="markersBox markersOffline" data-id="0" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_1" class="markersBox markersOffline" data-id="1" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_2" class="markersBox markersOffline" data-id="2" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_3" class="markersBox markersOffline" data-id="3" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_4" class="markersBox markersOffline" data-id="4" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_5" class="markersBox markersOffline" data-id="5" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_6" class="markersBox markersOffline" data-id="6" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_7" class="markersBox markersOffline" data-id="7" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_8" class="markersBox markersOffline" data-id="8" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_9" class="markersBox markersOffline" data-id="9" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_10" class="markersBox markersOffline" data-id="10" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_11" class="markersBox markersOffline" data-id="11" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_12" class="markersBox markersOffline" data-id="12" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_13" class="markersBox markersOffline" data-id="13" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_14" class="markersBox markersOffline" data-id="14" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_15" class="markersBox markersOffline" data-id="15" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_16" class="markersBox markersOffline" data-id="16" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_17" class="markersBox markersOffline" data-id="17" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_18" class="markersBox markersOffline" data-id="18" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>
				<div id="marker_19" class="markersBox markersOffline" data-id="19" data-state="0"><svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></div>

                <!-- Definir Lista de Cosas a Identificar en la imagen -->
                <ul id="thingsListBox" data-open="1"><h5 id="itmlistH5">Find:</h5></ul>

                <!-- Definir Help Data -->
                <div id="helpDataBox" data-open="0" style="display:none;">
                    <h5 id="itmlistH5">Help Data:</h5>
					<p>Please, follow the instructions to get the maximun points & get discount tickets !!!</p>
				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="js/findit.js"></script>

</body>
