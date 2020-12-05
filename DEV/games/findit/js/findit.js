// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Language =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - default data lang //

if ( !langElemAry ) {
	var langElemAry = JSON.parse( '{"OpenListBtn":"<span>Start </span>Game","HelpBtn":"<span>View </span>Help !"}' );
	var langTextAry = JSON.parse( '{"txtStart":"Start","txtView":"View","txtClose":"Close","txtPause":"Pause","txtContinue":"Continue","txtPoints":"Points","txtMarkers":"Markers","itmlistH5":"Find:","ExitBtn":"Exit Game"}' );
}

// - - - - - funcion de traslate con AJAX
function traslateLang( theLang ) {
	// open the lang config file
	var xRequest = new XMLHttpRequest();
	xRequest.open('GET', '/lang/text'+theLang+'.js', false); 
	xRequest.send(null);
	if (xRequest.status == 200) { 
		langTextAry = JSON.parse( xRequest.responseText ); 
	}
	// open the lang config file
	var xRequest = new XMLHttpRequest();
	xRequest.open('GET', '/lang/elem'+theLang+'.js', false); 
	xRequest.send(null);
	if (xRequest.status == 200) { 
		langElemAry = JSON.parse( xRequest.responseText ); 
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


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - CountDown
var theCounter, inPause = true; startCountDown( 1000 );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - SYSTEM VARS //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Markers =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Crea elemento opciones de marcador =>
var markerFixer = document.createElement("DIV");
markerFixer.id = "markerThumbtack";
markerFixer.class="markerOptions";
markerFixer.classList.add("markerOptions");
markerFixer.classList.add("markerOptsRight");
markerFixer.onclick = function () { alert('Fijar Marcador' + activeMarker.id ) };
markerFixer.innerHTML = '<svg viewBox="0 0 384 512"><path fill="currentColor" d="M306.5 186.6l-5.7-42.6H328c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24H56C42.8 0 32 10.8 32 24v96c0 13.2 10.8 24 24 24h27.2l-5.7 42.6C29.6 219.4 0 270.7 0 328c0 13.2 10.8 24 24 24h144v104c0 .9.1 1.7.4 2.5l16 48c2.4 7.3 12.8 7.3 15.2 0l16-48c.3-.8.4-1.7.4-2.5V352h144c13.2 0 24-10.8 24-24 0-57.3-29.6-108.6-77.5-141.4zM50.5 304c8.3-38.5 35.6-70 71.5-87.8L138 96H80V48h224v48h-58l16 120.2c35.8 17.8 63.2 49.4 71.5 87.8z" class=""></path></svg>';
var markerDelete = document.createElement("DIV");
markerDelete.id = "markerTrash";
markerDelete.classList.add("markerOptions");
markerDelete.classList.add("markerOptsRight");
markerDelete.onclick = function () { alert('Eliminar Marcador' + activeMarker.id ) };
markerDelete.innerHTML = '<svg viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z" class=""></path></svg>';
var markerOptions = document.createElement("DIV");
markerOptions.style.display = "block";
markerOptions.style.position = "relative";
markerOptions.appendChild(markerFixer);
markerOptions.appendChild(markerDelete);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Crea elemento opciones de marcador //
						

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - setMarker =>

function setMarker( ev, targetObj ) {

	// control de marcadores usados
	if ( parseInt( gameData.dataset.markused ) < parseInt( gameData.dataset.items ) ) {

		var fullMargin = parseInt( gameData.dataset.marksize ) + ( parseInt( gameData.dataset.markborder ) * 2 );
		var halfMargin = parseInt( fullMargin / 2 );
		var rect = targetObj.getBoundingClientRect();
		// calc X
		var targetX = parseInt( ev.clientX - rect.left - halfMargin );
		// calc Y
		var targetY = parseInt( ev.clientY - rect.top - halfMargin );
		// control X
		if ( targetX < 0 ) { targetX = 0; } 
		else if ( targetX >= ( gameData.dataset.x - halfMargin ) ) { targetX = ( gameData.dataset.x - fullMargin ); }
		// control Y
		if ( targetY < 0 ) { targetY = 0; } 
		else if ( targetY >= ( gameData.dataset.y - halfMargin ) ) { targetY = ( gameData.dataset.y - fullMargin ); }

		// selecciona proximo marcador libre
		markerObj = getNextMarker();

		// asigna como seleccionado
		selectMarker( markerObj );

		// posiciona y activa marcador
		markerObj.classList.remove("markersOffline");
		markerObj.classList.add("markersInline");
		markerObj.style.top = targetY;
		markerObj.style.left = targetX;
		markerObj.dataset.state = "1";
		alert("habilitando marker con id " + markerObj.id + " en posicion top " + targetY + " y left " + targetX );

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

	activeMarker.style.cursor = "move";
	activeMarker.classList.remove("markersInactive");
	activeMarker.classList.add("markersActive");

	markerObj.appendChild( markerOptions );

	// - - - - - Make the DIV element draggable
	dragElement( activeMarker );

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - selectMarker //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - unselectMarker =>

function unselectMarker() {

	// unset active marker (markactive)
	gameData.dataset.markactive = "-1";

	// modify pointer
	activeMarker.style.cursor = "pointer";

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


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - dragElement =>

function dragElement( targetObj ) {

  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

  targetObj.onmousedown = dragMouseDown;

	// - - - - - 
	function dragMouseDown( e ) {

	    e = e || window.event;

	    e.preventDefault();

	    // get the mouse cursor position at startup:
	    pos3 = e.clientX;
	    pos4 = e.clientY;

		// asigna funcion de dejar de arrastrar
	    document.onmouseup = closeDragElement;

	    // asigna funcion de iniciar arrastre
	    document.onmousemove = elementDrag;

	}

	// - - - - - 
	function elementDrag( e ) {

	    e = e || window.event;

	    e.preventDefault();

	    // calculate the new cursor position:
	    pos1 = pos3 - e.clientX;
	    pos2 = pos4 - e.clientY;
	    pos3 = e.clientX;
	    pos4 = e.clientY;

	    // set the element's new position:
	    targetObj.style.top = ( targetObj.offsetTop - pos2 ) + "px";
	    targetObj.style.left = ( targetObj.offsetLeft - pos1 ) + "px";

	}

	// - - - - - 
	function closeDragElement() {

	    // stop moving when mouse button is released:
	    document.onmouseup = null;
	    document.onmousemove = null;

	}

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - dragElement //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Markers //




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Menu Options =>

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - openbox =>

function displayBox( originObj, boxId, optionText, openBoxText, closeBoxText ) { 

alert( inExecution + " | " + theOpener + " | " + originObj.id + " | " + boxId );

	if ( !inExecution || theOpener == originObj.id ) {

		var targetObj = document.getElementById( boxId ); 
	
		if ( targetObj.dataset.open == "0" ) { 
	
			inExecution = true;
			theOpener = originObj.id;
	
			targetObj.style.padding = "10px"; 
			targetObj.style.height = "auto"; 
			targetObj.dataset.open = "1";
	
			if ( optionText ) { originObj.children[0].innerHTML = langTextAry[openBoxText]+" "; }
	
			//originObj.style.backgroundColor = originObj.style.borderTopColor; alert(originObj.id + " : " +originObj.style.borderTopColor);
			originObj.style.backgroundColor = "#ffcb00";
			originObj.style.color = "#333";
	
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
			originObj.style.color = "#ffcb00";
	
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


	// calc finded elements in array
	// calc finded elements in array	

	alert('Finish the Game & Get my Points');

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















