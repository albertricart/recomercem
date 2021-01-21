/*========= MENUS =========*/
var menuOpts = document.querySelectorAll(".js-menu-opt");
var previousTab = document.querySelector(menuOpts[0].dataset.tab);

/*========= GAME PARAMETERS =========*/
var speedControl = document.getElementById("speed");
var speedIncrementControl = document.getElementById("speedIncrement");
var livesControl = document.getElementById("chooseLives");
var difficultyControl = document.getElementById("difficulty");
var eventDurationControl = document.getElementById("eventDuration");
var eventIntervalControl = document.getElementById("eventInterval");
var speedSliderText = document.querySelector(".slideSpeed-value");
var speedIncrementSliderText = document.querySelector(".speedIncrement-value");
var livesSliderText = document.querySelector(".chooseLives-value");
var checkboxLightsOut = document.getElementById("lightsOut");
var checkboxDoublePoints = document.getElementById("pointsX2");
var checkboxLockY = document.getElementById("lockY");
var checkboxInvertAxis = document.getElementById("invertAxis");
var checkboxDodge = document.getElementById("dodge");
var controlButtons = document.querySelectorAll(".control-binding");
var buttonUp = document.getElementById("up");
var buttonDown = document.getElementById("down");
var buttonLeft = document.getElementById("left");
var buttonRight = document.getElementById("right");
var radioCa = document.getElementById("radioCa");
var radioEn = document.getElementById("radioEn");
var radioEs = document.getElementById("radioEs");

/*========= USER KEYBOARD CONTROLS =========*/
var keyUp;
var keyLeft;
var keyDown;
var keyRight;

/*========= LANGUAGE MANAGEMENT =========*/
//get language from cookie
var lang = getCookie("setLanguage");
//else get system language
if(lang == ""){
  lang = navigator.language.substring(0, 2);
}
//array containing all translatable content
var langArray;
//array containing all translatable DOM elements
var translatables = document.querySelectorAll(".lang");

/*========= MISC =========*/
var difficultyValue = difficultyControl.value;

//prepares 1st settings menu tab
displayMenuOpt(previousTab, menuOpts[0].dataset.tab);
//gets and sets language
getLanguageJson();
//sets users controls
setControls();

//prevent event duration > event interval
eventIntervalControl.onchange = function () {
  if (parseInt(eventIntervalControl.value) <= parseInt(eventDurationControl.value)) {
    eventDurationControl.value = eventIntervalControl.value;
  }
};

//prevent event duration > event interval
eventDurationControl.onchange = function () {
  if (parseInt(eventDurationControl.value) >= parseInt(eventIntervalControl.value)) {
    eventIntervalControl.value = eventDurationControl.value;
  }
};


//listener for setting up key
buttonUp.addEventListener("keypress", function (e) {
  setCookie("keyUp", e.code);
  keyUp = e.code;
  buttonUp.innerHTML = e.code.replace("Key", "");
});

//listener for setting left key
buttonLeft.addEventListener("keypress", function (e) {
  setCookie("keyLeft", e.code);
  keyLeft = e.code;
  buttonLeft.innerHTML = e.code.replace("Key", "");
});

//listener for setting down key
buttonDown.addEventListener("keypress", function (e) {
  setCookie("keyDown", e.code);
  keyDown = e.code;
  buttonDown.innerHTML = e.code.replace("Key", "");
});

//listener for setting right key
buttonRight.addEventListener("keypress", function (e) {
  setCookie("keyRight", e.code);
  keyRight = e.code;
  buttonRight.innerHTML = e.code.replace("Key", "");
});

//update game parameters when changing difficulty preset
difficultyControl.oninput = function () {
  difficultyValue = difficultyControl.value;
  updateParameters();
};

//set select value on custom when changing parameters
function setCustomOnInput(control, display) {
  control.oninput = function () {
    difficultyControl.value = "Custom";
    if (display != null) {
      display.innerHTML = control.value;
    }
  };
}

setCustomOnInput(livesControl, livesSliderText);
setCustomOnInput(speedIncrementControl, speedIncrementSliderText);
setCustomOnInput(speedControl, speedSliderText);
setCustomOnInput(eventIntervalControl, null);
setCustomOnInput(eventDurationControl, null);
setCustomOnInput(checkboxLightsOut, null);
setCustomOnInput(checkboxDoublePoints, null);
setCustomOnInput(checkboxLockY, null);
setCustomOnInput(checkboxInvertAxis, null);
setCustomOnInput(checkboxDodge, null);

//code necessary for moving around tabs 
for (var x = 0; x < menuOpts.length; x++) {
  menuOpts[x].addEventListener("click", function () {
    var tabName = this.dataset.tab;
    var tab = document.querySelector(tabName);

    if (previousTab != null && previousTab != tab) {
      previousTab.classList.remove("animate__fadeInLeft");
      previousTab.classList.add("animate__fadeOutRight");
      setTimeout(function () {
        previousTab.classList.remove("show");
        previousTab.classList.add("hidden");
        previousTab = tab;

        displayMenuOpt(tab, tabName);
      }, 400);
    }
  });
}

function displayMenuOpt(tab, tabName) {
  tab.classList.remove("hidden");
  tab.classList.add("show");
  tab.classList.remove("animate__fadeOutRight");
  tab.classList.add("animate__fadeInLeft");

  switch (tabName) {
    case "#tabParam":
      updateParameters();
      break;

    case "#tabCtrl":
      displayKeyControls();
      break;

    case "#tabLang":
      manageLanguage();
      break;
  }
}

/*========= GAME PARAMETERS =========*/

function updateParameters() {
  switch (difficultyValue) {
    case "Easy":
      asignParametersValues(1, 1, 25, 10, 5, true, false, true, false, true);
      break;

    case "Normal":
      asignParametersValues(2, 1, 15, 7, 5, true, true, true, false, true);
      break;

    case "Hard":
      asignParametersValues(2, 2, 15, 13, 5, true, true, true, true, true);
      break;
  }

  speedSliderText.innerHTML = speedControl.value;
  speedIncrementSliderText.innerHTML = speedIncrementControl.value;
  livesSliderText.innerHTML = livesControl.value;
}

function asignParametersValues(speed, speedIncrement, eventInterval, eventDuration, lives, lightsOut, doublePoints, lockY, invertAxis, dodge) {
  speedControl.value = speed;
  speedIncrementControl.value = speedIncrement;
  eventIntervalControl.value = eventInterval;
  eventDurationControl.value = eventDuration;
  livesControl.value = lives;
  checkboxLightsOut.checked = lightsOut;
  checkboxDoublePoints.checked = doublePoints;
  checkboxLockY.checked = lockY;
  checkboxInvertAxis.checked = invertAxis;
  checkboxDodge.checked = dodge;
}

/*========= USER KEYBOARD CONTROLS =========*/

function displayKeyControls() {
  for (let i = 0; i < controlButtons.length; i++) {
    awaitBindingResponse(controlButtons[i]);
  }

  setControls();
  
  //hide the Key prefix when displaying each key
  buttonUp.innerHTML = keyUp.replace("Key", "");
  buttonDown.innerHTML = keyDown.replace("Key", "");
  buttonLeft.innerHTML = keyLeft.replace("Key", "");
  buttonRight.innerHTML = keyRight.replace("Key", "");
}

function awaitBindingResponse(elem) {
  elem.addEventListener("click", function () {
    elem.innerHTML = "Waiting for key press...";
  });
}

function setControls() {
  keyUp = getCookie("keyUp");
  keyLeft = getCookie("keyLeft");
  keyDown = getCookie("keyDown");
  keyRight = getCookie("keyRight");

  if (getCookie("keyUp") == "") {
    keyUp = "KeyW";
  }
  if (getCookie("keyLeft") == "") {
    keyLeft = "KeyA";
  }
  if (getCookie("keyDown") == "") {
    keyDown = "KeyS";
  }
  if (getCookie("keyRight") == "") {
    keyRight = "KeyD";
  }
}

/*========= COOKIES =========*/

function setCookie(cname, cvalue) {
  document.cookie =
    cname + "=" + cvalue + "; expires=Tue, 19 Jan 2038 03:14:07 UTC";
}

function getCookie(cname) {
  var name = cname + "=";
  var carray = document.cookie.split(";");
  for (var i = 0; i < carray.length; i++) {
    var c = carray[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

/*========= LANGUAGE =========*/

function manageLanguage() {
  radioCa.onchange = function () {
    lang = "cat";
    getLanguageJson();
  };

  radioEn.onchange = function () {
    lang = "eng";
    getLanguageJson();
  };

  radioEs.onchange = function () {
    lang = "esp";
    getLanguageJson();
  };

  switch (lang) {
    case "eng":
      radioEn.checked = true;
      break;

    case "esp":
      radioEs.checked = true;
      break;

    case "cat":
      radioCa.checked = true;
      break;

    default:
      radioEn.checked = true;
      lang = "eng";
      break;
  }
}

function getLanguageJson() {
  fetch("./lang/" + lang + ".json")
    .then((response) => {
      if (!response.ok) {
        throw new Error("HTTP error " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      setLanguage(data);
    })
    .catch(function () {
      this.dataError = true;
    });
}

function setLanguage(data) {
  langArray = data;
  translatables.forEach((element) => {
    let key = element.getAttribute("key");
    element.innerHTML = langArray[key];
  });
}