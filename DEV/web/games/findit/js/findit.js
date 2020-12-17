// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Init =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - onload =>

function onloadFx() {

	setGameData();

	createMarkers();

	createItemList();

	traslateLang();

	document.getElementById("CounterdownBox").innerHTML = gameData.dataset.time + '"';

	// - - - - - traking mouse pointer

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - onload //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Init //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Language =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - default data lang //

// - - - - - default lang data
if ( !setLanguage ) { var setLanguage = 'eng'; }


// - - - - - default JSON lang data
if ( !jsonLangElement ) {
	var jsonLangElement = [];
	var jsonLangText = [];
	jsonLangElement['eng'] = '{"OpenListBtn":"<span>Start </span>Game","HelpBtn":"<span>View </span>Help !","itmlistH5":"Find the following targets:","ExitBtn":"Exit Game"}';
	jsonLangElement['esp'] = '{"OpenListBtn":"<span>Start </span>Game","HelpBtn":"<span>View </span>Help !","itmlistH5":"Find the following targets:","ExitBtn":"Exit Game"}';
	jsonLangElement['cat'] = '{"OpenListBtn":"<span>Start </span>Game","HelpBtn":"<span>View </span>Help !","itmlistH5":"Find the following targets:","ExitBtn":"Exit Game"}';
	jsonLangText['eng'] = '{"txtStart":"Start","txtView":"View","txtClose":"Close","txtPause":"Pause","txtContinue":"Continue","txtPoints":"Points","txtMarkers":"Markers","txtExitConfirm":"If you exit the game, you\'re gonna lose all the work you made it in. DO YOU REALLY WANT TO EXIT THE GAME ?"}';
	jsonLangText['esp'] = '{"txtStart":"Start","txtView":"View","txtClose":"Close","txtPause":"Pause","txtContinue":"Continue","txtPoints":"Points","txtMarkers":"Markers","txtExitConfirm":"If you exit the game, you\'re gonna lose all the work you made it in. DO YOU REALLY WANT TO EXIT THE GAME ?"}';
	jsonLangText['cat'] = '{"txtStart":"Start","txtView":"View","txtClose":"Close","txtPause":"Pause","txtContinue":"Continue","txtPoints":"Points","txtMarkers":"Markers","txtExitConfirm":"If you exit the game, you\'re gonna lose all the work you made it in. DO YOU REALLY WANT TO EXIT THE GAME ?"}';	
}

var langElemAry = JSON.parse( jsonLangElement[setLanguage] );
var langTextAry = JSON.parse( jsonLangText[setLanguage] );

// - - - - - funcion de get Lang Data con AJAX
function traslateLang( theLang ) {
	// open the lang config file
	var xRequest = new XMLHttpRequest();
	xRequest.open('GET', '/lang/text'+theLang+'.js', false); 
	xRequest.send(null);
	if (xRequest.status == 200) { 
		jsonLangText[theLang] = xRequest.responseText; 
	}
	// open the lang config file
	var xRequest = new XMLHttpRequest();
	xRequest.open('GET', '/lang/elem'+theLang+'.js', false); 
	xRequest.send(null);
	if (xRequest.status == 200) { 
		jsonLangElement[theLang] = xRequest.responseText; 
		traslateLang();
	}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - default data lang //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - funcion de traslate =>

function traslateLang() {

	for( var indexKey in langElemAry ) {
  		document.getElementById(indexKey).innerHTML = langElemAry[indexKey];
	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - funcion de traslate //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Language //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - SYSTEM VARS =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - activeMarker
var activeMarker = null; // marcador activo


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - InExecution control
var inExecution = true, theOpener = "OpenListBtn"; // marcador activo


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - gameData
var gameData = document.getElementById("ControlBox"); // objeto de informacion de juego
// gameData.dataset.x="1280"
// gameData.dataset.y="720"
// gameData.dataset.items="20"
// gameData.dataset.marksize="30"
// gameData.dataset.markborder="4"
// gameData.dataset.markused="0"
// gameData.dataset.visibility="1"
// gameData.dataset.markactive="0"
// gameData.dataset.score="0"
// gameData.dataset.time="120"
var fullMarkerSize = parseInt( gameData.dataset.marksize ) + ( parseInt( gameData.dataset.sizextra ) * 2 );
var halfMarkerSize = parseInt( fullMarkerSize / 2 );


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - gameData
var gameLayerBox = document.getElementById("GameLayerBox"); // game layer

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - gameData
var gameImage = document.getElementById("gameImage"); // game image


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - CountDown
var theCounter, inPause = true; startCountDown( 1000 );


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Game Default Data
if ( !theGameImage ) { var theGameImage = "images/gameimg_1.jpg"; }

if ( !theGameTargets ) { 
	var theGameTargets = JSON.parse( '[{"description":"Item 00","x":100,"y":100},{"description":"Item 01","x":100,"y":200},{"description":"Item 02","x":100,"y":300},{"description":"Item 03","x":100,"y":400},{"description":"Item 04","x":100,"y":500},{"description":"Item 05","x":300,"y":100},{"description":"Item 06","x":300,"y":200},{"description":"Item 07","x":300,"y":300},{"description":"Item 08","x":300,"y":400},{"description":"Item 09","x":300,"y":500},{"description":"Item 10","x":500,"y":100},{"description":"Item 11","x":500,"y":200},{"description":"Item 12","x":500,"y":300},{"description":"Item 13","x":500,"y":400},{"description":"Item 14","x":500,"y":500},{"description":"Item 15","x":900,"y":100},{"description":"Item 16","x":900,"y":200},{"description":"Item 17","x":900,"y":300},{"description":"Item 18","x":900,"y":400},{"description":"Item 19","x":900,"y":500}]' );
}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setGameData =>

function setGameData() {

	// - - - - carga los set de juegos disponibles. Si no existe, se utilizara el default. Esta funcion se destina a cargar odiferentes set de juegos.
	gameImage.src = theGameImage;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setGameData //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - SYSTEM VARS //



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Targets =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - createItemList =>

function createItemList() {

	var helpDataBox = document.getElementById("thingsListBox");
	var itmlist;

	for( var i = 0; i < theGameTargets.length; i++ ) {

		itmlist = document.createElement("LI");
		itmlist.id = "itmlist_" + i;
		itmlist.classList.add( "searchItemLst" );
		itmlist.setAttribute( "data-state", 0 );
		itmlist.innerHTML = theGameTargets[i]["description"];

		helpDataBox.appendChild( itmlist );

	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - createItemList //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Targets =>




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Markers =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Crea elemento opciones de marcador =>
var markerFixer = document.createElement("DIV");
markerFixer.id = "markerThumbtack";
//markerFixer.class="markerOptions";
markerFixer.classList.add("markerOptions");
markerFixer.classList.add("markerOptsRight");
markerFixer.onclick = unselectMarker;
markerFixer.innerHTML = '<svg viewBox="0 0 384 512"><path fill="currentColor" d="M306.5 186.6l-5.7-42.6H328c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24H56C42.8 0 32 10.8 32 24v96c0 13.2 10.8 24 24 24h27.2l-5.7 42.6C29.6 219.4 0 270.7 0 328c0 13.2 10.8 24 24 24h144v104c0 .9.1 1.7.4 2.5l16 48c2.4 7.3 12.8 7.3 15.2 0l16-48c.3-.8.4-1.7.4-2.5V352h144c13.2 0 24-10.8 24-24 0-57.3-29.6-108.6-77.5-141.4zM50.5 304c8.3-38.5 35.6-70 71.5-87.8L138 96H80V48h224v48h-58l16 120.2c35.8 17.8 63.2 49.4 71.5 87.8z" class=""></path></svg>';
var markerDelete = document.createElement("DIV");
markerDelete.id = "markerTrash";
markerDelete.classList.add("markerOptions");
markerDelete.classList.add("markerOptsRight");
markerDelete.onclick = deleteMarker;
markerDelete.innerHTML = '<svg viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z" class=""></path></svg>';
var markerOptions = document.createElement("DIV");
markerOptions.id = "markerOption";
markerOptions.style.display = "block";
markerOptions.style.position = "relative";
markerOptions.style.marginTop = "-32px";
markerOptions.appendChild(markerFixer);
markerOptions.appendChild(markerDelete);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Crea elemento opciones de marcador //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - createMarkers =>

function createMarkers() {

	var tmpItems = parseInt( gameData.dataset.items );

	var markerInner = '<svg role="img" style="width: 100%;height: 100%; filter: drop-shadow(0px 0px 2px rgb(0, 0, 0));" viewBox="0 0 320 512" onClick="checkthis(this.parentElement)"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg>';

	var helpDataBox = document.getElementById("thingsListBox");
	var markerElement;

	for( var i = 0; i < tmpItems; i++ ) {

		markerElement = document.createElement("DIV");
		markerElement.id = "marker_" + i
		markerElement.classList.add("markersBox");
		markerElement.classList.add("markersOffline");
		markerElement.setAttribute( "data-id", i );
		markerElement.setAttribute( "data-state", 0 );
		markerElement.innerHTML = markerInner;

		gameLayerBox.appendChild( markerElement );

	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - createMarkers //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setMarker =>

function checkthis( targetObj ) {

	if ( parseInt( targetObj.dataset.state ) == 1 && targetObj.dataset.id != gameData.dataset.markactive ) { 

		selectMarker( targetObj ); 

	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setMarker =>


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setMarker =>

function setMarker( ev, targetObj ) {

	// control de marcadores usados
	if ( parseInt( gameData.dataset.markused ) < parseInt( gameData.dataset.items ) ) {

		var varX = parseInt( gameData.dataset.x );
		var varY = parseInt( gameData.dataset.y );

		// calc X
		var targetX = ev.offsetX - halfMarkerSize;

		// calc Y
		var targetY = ev.offsetY - halfMarkerSize;

		//console.log( 'fullMarkerSize: ' + fullMarkerSize + ' | halfMarkerSize: ' +  halfMarkerSize + ' | targetX: ' + targetX + ' | targetY: ' + targetY );
		// control X
		if ( targetX < 0 ) { targetX = 0; } else if ( (targetX + fullMarkerSize) >= ( varX ) ) { targetX = ( varX - fullMarkerSize ); }
		// control Y
		if ( targetY < 0 ) { targetY = 0; } else if ( (targetY + fullMarkerSize) >= ( varY ) ) { targetY = ( varY - fullMarkerSize ); }
		//console.log( 'fullMarkerSize: ' + fullMarkerSize + ' | halfMarkerSize: ' +  halfMarkerSize + ' | targetX: ' + targetX + ' | targetY: ' + targetY );

		// selecciona proximo marcador libre
		markerObj = getNextMarker();

		// posiciona y activa marcador
		markerObj.classList.remove("markersOffline");
		markerObj.classList.add("markersInline");
		//markerObj.style.top = targetY + "px";
		markerObj.style.top = (targetY * 100) / gameLayerBox.offsetHeight + "%";
		//markerObj.style.left = targetX + "px";
		markerObj.style.left = (targetX * 100) / gameLayerBox.offsetWidth + "%";

		markerObj.dataset.state = "1";

		// asigna como seleccionado
		selectMarker( markerObj );

		// suma a marcadores usados
		gameData.dataset.markused = parseInt( gameData.dataset.markused ) + 1;
		// visualiza marcadores restantes
		document.getElementById("RemainMarkerBox").innerHTML = ( parseInt( gameData.dataset.items ) - parseInt( gameData.dataset.markused ) ) + " " + langTextAry["txtMarkers"];



	} else { 

		alert("Ya se han utilizado todos los marcadores disponibles (" + gameData.dataset.markused + "/" + gameData.dataset.items + "), debe eliminar o desplazar alguno de los marcadores de la imagen");

	}

}	

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setMarker //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - getNextMarker =>

function getNextMarker() { 
	// retorna primer marcador libre de la lista
	return markerObj = document.querySelector('.markersBox[data-state="0"]');
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - getNextMarker //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - selectMarker =>

function selectMarker( targetObj ) {

	// unselect lastone
	if ( activeMarker ) { unselectMarker(); }

	activeMarker = targetObj;

	gameData.dataset.markactive = targetObj.dataset.id

	targetObj.style.cursor = "move";
	targetObj.classList.remove("markersInactive");
	targetObj.classList.add("markersActive");

	//console.log( parseInt(targetObj.style.left.substring(0, targetObj.style.left.length-2)) + ' > ( parseInt( ' + gameData.dataset.x + ' ) / 2 ) ' );

	if ( targetObj.offsetLeft > ( gameData.offsetWidth / 2 ) ) {
		markerFixer.classList.remove("markerOptsRight");
		markerFixer.classList.add("markerOptsLeft");
		markerDelete.classList.remove("markerOptsRight");
		markerDelete.classList.add("markerOptsLeft");
	} else {
		markerFixer.classList.remove("markerOptsLeft");
		markerFixer.classList.add("markerOptsRight");
		markerDelete.classList.remove("markerOptsLeft");
		markerDelete.classList.add("markerOptsRight");
	}

	targetObj.appendChild( markerOptions );

	// - - - - - Make the DIV element PSEUDO-DRAGGABLE
	dragActiveMarker();

//	targetObj.draggable = "true";
//	targetObj.ondragstart = onDragStartMarker;	// El evento ocurre cuando el usuario comienza a arrastrar un elemento

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - selectMarker //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - dragActiveMarker =>

function dragActiveMarker(){

	var dragOK = true;
	
	var mouseX, mouseY;

	var dataLayer = gameLayerBox.getBoundingClientRect();

    activeMarker.onmousedown = dragMarker; // asigna funcion "dragMarker" de desplazamiento de elemento cuando el boton esta presionado

	function dragMarker( ev ) {
		ev = ev || window.event; // toma parametro o evento ocurrido
		ev.preventDefault(); // prevencion de evento por default
		// - - - - - coordenadas de puntero de raton
		mouseX = ev.clientX;
		mouseY = ev.clientY;
	    document.onmousemove = draggingMarker; // Inicia funcion cuando el mouse se desplaza (no boton presionado)
	    document.onmouseup = dropMarker; // Finaliza desplazamiento de elemento cuando se suelta el boton del mouse
	}

	function draggingMarker( ev ) {
		ev = ev || window.event; // toma parametro o evento ocurrido
		ev.preventDefault(); // prevencion de evento por default
		// calcula coordenadas de puntero de raton
		var tmpX = activeMarker.offsetLeft - ( mouseX - ev.clientX ); 
		var tmpY = activeMarker.offsetTop - ( mouseY - ev.clientY );
		// - - - - - control de outside layer
		if ( tmpX < 0 ) { tmpX = 0; } 
		else if ( ( tmpX + fullMarkerSize ) >= dataLayer.width ) { tmpX = dataLayer.width - fullMarkerSize; } 
		if ( tmpY < 0 ) { mouseY = tmpY = 0; } 
		else if ( ( tmpY + fullMarkerSize ) >= dataLayer.height ) { mouseY = tmpY = dataLayer.height - fullMarkerSize; } 
		// - - - - - establece posicion de marcador
		//activeMarker.style.left = ( tmpX ) + "px";
		activeMarker.style.left = (tmpX * 100) / gameLayerBox.offsetWidth + "%";
		//activeMarker.style.top = ( tmpY ) + "px";
		activeMarker.style.top = (tmpY * 100) / gameLayerBox.offsetHeight + "%";
		mouseX = ev.clientX;		
		mouseY = ev.clientY;
		// control de visualizacion de opciones
		if ( activeMarker.offsetLeft > ( gameData.offsetWidth / 2 ) ) {
			markerFixer.classList.remove("markerOptsRight");
			markerFixer.classList.add("markerOptsLeft");
			markerDelete.classList.remove("markerOptsRight");
			markerDelete.classList.add("markerOptsLeft");
		} else {
			markerFixer.classList.remove("markerOptsLeft");
			markerFixer.classList.add("markerOptsRight");
			markerDelete.classList.remove("markerOptsLeft");
			markerDelete.classList.add("markerOptsRight");
		}

	}

	function dropMarker() { // stop moving when mouse
		document.onmouseup = null;
		document.onmousemove = null;
	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - dragActiveMarker //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - unselectMarker =>

function unselectMarker() {

	// unset active marker (markactive)
	gameData.dataset.markactive = "-1";

	// modify pointer
	activeMarker.style.cursor = "pointer";

	// no es necesario para mover pero si lo es para fijar el elemento
	activeMarker.removeChild( markerOptions );

	// reasign classes
	activeMarker.classList.remove("markersActive");
	activeMarker.classList.add("markersInactive");

	// deactivate drag
	activeMarker.onmousedown = null;

	// clean var activeMaker
	activeMarker = null;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - unselectMarker =>


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - deleteMarker =>

function deleteMarker() {

	activeMarker.classList.remove("markersInline");
	activeMarker.classList.add("markersOffline");
	activeMarker.style.top = "0";
	activeMarker.style.left = "-50px";
	activeMarker.dataset.state = "0";

	// suma a marcadores usados
	gameData.dataset.markused = parseInt( gameData.dataset.markused ) - 1;
	// visualiza marcadores restantes
	document.getElementById("RemainMarkerBox").innerHTML = ( parseInt( gameData.dataset.items ) - parseInt( gameData.dataset.markused ) ) + " " + langTextAry["txtMarkers"];

	unselectMarker();

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - visibilityMarkersAll =>

function visibilityMarkersAll() { 

	var visibilityValue;

	if ( parseInt( gameData.dataset.visibility ) == 1 ) { 

		visibilityValue = "hidden"; 
		gameData.dataset.visibility = 0;

	} else { 

		visibilityValue = "visible"; 
		gameData.dataset.visibility = 1;

	}

	var theResult = document.querySelectorAll('.markersBox');

	if ( theResult ) {

		for ( var i = 0; i < theResult.length; i++ ) { theResult[i].style.visibility = visibilityValue; } 

	}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - visibilityMarkersAll //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Markers //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Menu Options =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - openbox =>

function displayBox( originObj, boxId, optionText, openBoxText, closeBoxText ) { 

	//alert( inExecution + " | " + theOpener + " | " + originObj.id + " | " + boxId );

	if ( !inExecution || theOpener == originObj.id ) {

		var targetObj;

		if ( boxId ) { targetObj = document.getElementById( boxId ); }
	
		if ( !targetObj ) { // sin elemento para abrir 

			inExecution = true; theOpener = originObj.id;
			
			visibilityMarkersAll();

			document.getElementById("gameImage").style.visibility = "hidden";
	
			pauseCountDown();

			originObj.style.backgroundColor = document.documentElement.style.getPropertyValue("--colPrimary");;
			originObj.style.color = document.documentElement.style.getPropertyValue("--colWhite");;

			if ( confirm( langTextAry['txtExitConfirm'] ) ) { 
				
				window.location.href = "http://recomercem.es/index.html"; 
		
			} else {

				visibilityMarkersAll();

				document.getElementById("gameImage").style.visibility = "visible";

				pauseCountDown();

				originObj.style.backgroundColor = "rgba(0,0,0,0)";
				originObj.style.color = document.documentElement.style.getPropertyValue("--colPrimary");;

				inExecution = false; theOpener = "";
				
			}

		} else if ( targetObj.dataset.open == "0" ) { 
	
			inExecution = true;
			theOpener = originObj.id;
	
			targetObj.style.padding = "10px"; 
			targetObj.style.height = "auto"; 
			targetObj.dataset.open = "1";
	
			if ( optionText ) { originObj.children[0].innerHTML = langTextAry[openBoxText]+" "; }
	
			//originObj.style.backgroundColor = originObj.style.borderTopColor; alert(originObj.id + " : " +originObj.style.borderTopColor);
			originObj.style.backgroundColor = document.documentElement.style.getPropertyValue("--colPrimary");	// old era "#ffcb00";
			originObj.style.color = document.documentElement.style.getPropertyValue("--colWhite");
	
			visibilityMarkersAll();

			document.getElementById("gameImage").style.visibility = "hidden";
	
			pauseCountDown();
	
		} else { 
	
			inExecution = false;
			theOpener = "";
	
			targetObj.style.height = "0"; 
			targetObj.style.padding = "0"; 
			targetObj.dataset.open = "0";
	
			if ( optionText ) { originObj.children[0].innerHTML = langTextAry[closeBoxText]+" "; }
	
			originObj.style.backgroundColor = "rgba(0,0,0,0)";
			//originObj.style.color = originObj.style.borderTopColor; alert(originObj.id + " : " +originObj.style.borderTopColor);
			originObj.style.color = document.documentElement.style.getPropertyValue("--colPrimary");	// old era "#ffcb00";
	
			visibilityMarkersAll();

			pauseCountDown();
	
			document.getElementById("gameImage").style.visibility = "visible";
	
		} 

	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - openbox //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - finishGame =>

function finishGame() {

	endCountDown();

	visibilityMarkersAll();

	document.getElementById("gameImage").style.visibility = "hidden";

	document.getElementById("OpenListBtn").onclick = null;
	document.getElementById("EndGameBtn").onclick = null;
	document.getElementById("HelpBtn").onclick = null;

	// - - - - - Control de aciertos (collisions?) =>

	var targetsFinded = 0;
	var targetSize = parseInt ( gameData.dataset.marksize );

	var theMarkers = document.querySelectorAll('.markersBox[data-state="1"]');

	var logstring;

	if ( theMarkers ) {

		for ( var i = 0; i < theMarkers.length; i++ ) { 

			tLeft = theMarkers[i].offsetLeft + halfMarkerSize;
			tTop = theMarkers[i].offsetTop + halfMarkerSize;

			gotIt = false;

console.log( "Marker point "+tLeft+","+tTop+" => ");

			for( var j = 0; j < theGameTargets.length; j++ ) {

				if ( tLeft > theGameTargets[j]['x'] && tLeft < theGameTargets[j]['x']+targetSize && 
					 tTop > theGameTargets[j]['y'] && tTop < theGameTargets[j]['y']+targetSize ) {

					gotIt = true;

				}

console.log( "- target "+theGameTargets[j]['x']+","+theGameTargets[j]['y']+" - "+ (theGameTargets[j]['x']+targetSize)+","+(theGameTargets[j]['y']+targetSize)+((gotIt)?"GOT":"") );

			}

			if (gotIt) { 
				++targetsFinded; 
console.log( ">>> Encontrado !" );
			} else {
console.log( "--- no one got it" );
			}

		} 

	}

	// - - - - - Control de aciertos (collisions?) //

	var elapsedTime = parseInt ( gameData.dataset.time );
	var pointsByTarget = parseInt ( elapsedTime / parseInt ( gameData.dataset.items ) );
	var totalScore = pointsByTarget * targetsFinded;

	gameData.dataset.score = totalScore;
	document.getElementById("ScoreBox").innerHTML = totalScore + " " + langTextAry["txtPoints"];

	alert("Finish the Game & Get my Points': You\'ve got " + targetsFinded + " of " + gameData.dataset.items + " targets. Your final score is " + totalScore + " points !!!" );

	// resumen de juego y salida a summary por formulario post
	document.getElementById('finalscore').value = totalScore;
	document.getElementById('endgame').submit();

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - finishGame //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Menu Options //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - CountDown =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - startCountDown =>

function startCountDown( nTime ) {

	theCounter = window.setInterval( function() {

		if ( !inPause ) {

			var tmpTime = parseInt( gameData.dataset.time ) - 1;

			if ( tmpTime < 0 ) { 

				inPause = true; 

				finishGame();

			} else {

				gameData.dataset.time = tmpTime;

				document.getElementById("CounterdownBox").innerHTML = gameData.dataset.time + '"';

			}

		}

	}, nTime );

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - startCountDown //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - pauseCountDown =>

function pauseCountDown() { inPause = !inPause; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - pauseCountDown //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - endCountDown =>

function endCountDown() { window.clearTimeout( theCounter ); inPause = false; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - endCountDown //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - CountDown //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - TrakingMouse //

var mouseTrack = false; 
var pntrX = document.getElementById("pointerX"); 
var pntrY = document.getElementById("pointerY"); 
//setMouseTrack();
function setMouseTrack() { 
	if ( !mouseTrack ) { 
		gameImage.addEventListener( 'mousemove', e => { pntrX.innerHTML = parseInt(e.offsetX); pntrY.innerHTML = parseInt(e.offsetY); } ); 
	} else { 
		gameImage.removeEventListener( 'mousemove', e => { } ); 
	}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - TrakingMouse //