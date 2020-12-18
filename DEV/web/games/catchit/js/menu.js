var mainMenu = document.querySelector(".main-menu");
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
var buttonUp = document.getElementById("up");
var buttonDown = document.getElementById("down");
var buttonLeft = document.getElementById("left");
var buttonRight = document.getElementById("right");
var radioCa = document.getElementById("radioCa");
var radioEn = document.getElementById("radioEn");
var radioEs = document.getElementById("radioEs");
var difficultyValue = difficultyControl.value;
var output = document.getElementById("demo");
var controlButtons = document.querySelectorAll(".control-binding");
var tabParameters = document.querySelector(".parameters_opt_text");
var tabLanguage = document.querySelector(".language_opt_text");
var tabTutorial = document.querySelector(".tutorial_opt_text");
var tabControls = document.querySelector(".controls_opt_text");
var timeText = document.querySelector(".game-time");
var livesText = document.querySelector(".game-lives");
var pointsText = document.querySelector(".game-points");
var eventText = document.querySelector(".game-event");
var eventTimeText = document.querySelector(".eventTimeText");
var fabCode = document.querySelector(".fab-code");
var fabSettings = document.querySelector(".fab-settings");
var difficultyLabel = document.querySelector(".difficulty-label");
var livesLabel = document.querySelector(".lives-label");
var initialSpeedLabel = document.querySelector(".initialSpeed-label");
var speedIncrementLabel = document.querySelector(".speedIncrement-label");
var eventIntervalLabel = document.querySelector(".eventInterval-label");
var eventDurationLabel = document.querySelector(".eventDuration-label");
var chooseEventDesc = document.querySelector(".chooseEventDesc");
var lightsOutLabel = document.querySelector(".lightsOut-label");
var doublePointsLabel = document.querySelector(".doublePoints-label");
var lockYLabel = document.querySelector(".lockY-label");
var invertAxisLabel = document.querySelector(".invertAxis-label");
var upLabel = document.querySelector(".up-label");
var leftLabel = document.querySelector(".left-label");
var rightLabel = document.querySelector(".right-label");
var downLabel = document.querySelector(".down-label");
var easyOpt = document.querySelector(".easy-opt");
var normalOpt = document.querySelector(".normal-opt");
var hardOpt = document.querySelector(".hard-opt");
var customOpt = document.querySelector(".custom-opt");
var controlsDesc = document.querySelector(".controlsDesc");
var languageDesc = document.querySelector(".languageDesc");
var settingsMenuBack = document.querySelector(".menu-back");
var settingsMenuBackText = document.querySelector(".menu-back-text");
var lang = navigator.language.substring(0, 2);
var langArray;

var menuOpts = document.querySelectorAll(".js-menu-opt");
var previousTab = document.querySelector(menuOpts[0].dataset.tab);
displayMenuOpt(previousTab, menuOpts[0].dataset.tab);
getLanguageJson();

var keyUp;
var keyLeft;
var keyDown;
var keyRight;
setControls();

eventIntervalControl.onchange = function(){
  if(parseInt(eventIntervalControl.value) <= parseInt(eventDurationControl.value)){
    eventDurationControl.value = eventIntervalControl.value;
  }
}

eventDurationControl.onchange = function(){
  if(parseInt(eventDurationControl.value) >= parseInt(eventIntervalControl.value)){
    eventIntervalControl.value= eventDurationControl.value ;
  }
}

settingsMenuBack.addEventListener("click", function(){
  closeSettingsMenu();
});

buttonUp.addEventListener("keypress", function (e) {
  setCookie("keyUp", e.code);
  keyUp = e.code;
  buttonUp.innerHTML = e.code.replace("Key", "");
});

buttonLeft.addEventListener("keypress", function (e) {
  setCookie("keyLeft", e.code);
  keyLeft = e.code;
  buttonLeft.innerHTML = e.code.replace("Key", "");
});

buttonDown.addEventListener("keypress", function (e) {
  setCookie("keyDown", e.code);
  keyDown = e.code;
  buttonDown.innerHTML = e.code.replace("Key", "");
});

buttonRight.addEventListener("keypress", function (e) {
  setCookie("keyRight", e.code);
  keyRight = e.code;
  buttonRight.innerHTML = e.code.replace("Key", "");
});

difficultyControl.oninput = function () {
  difficultyValue = difficultyControl.value;
  updateParameters();
};

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

    case "#tabTuto":
      break;
  }
}

function manageLanguage() {
  radioCa.onchange = function () {
    lang = "ca";
    getLanguageJson()
  };

  radioEn.onchange = function () {
    lang = "en";
    getLanguageJson()
  };

  radioEs.onchange = function () {
    lang = "es";
    getLanguageJson()
  };

  switch (lang) {
    case "en":
      radioEn.checked = true;
      break;

    case "es":
      radioEs.checked = true;
      break;

    case "ca":
      radioCa.checked = true;
      break;

    default:
      radioEn.checked = true;
      lang = "en";
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
    .then(data => {
      setLanguage(data);
    })
    .catch(function () {
      this.dataError = true;
    });
}

function setLanguage(data){
  langArray = data;
  timeText.innerHTML = langArray.time;
  livesText.innerHTML = langArray.lives;
  pointsText.innerHTML = langArray.points;
  eventText.innerHTML = langArray.event;
  fabCode.innerHTML = langArray.code;
  fabSettings.innerHTML = langArray.settings;
  difficultyLabel.innerHTML = langArray.difficulty;
  livesLabel.innerHTML = langArray.lives;
  initialSpeedLabel.innerHTML = langArray.initialSpeed;
  speedIncrementLabel.innerHTML = langArray.speedIncrement;
  eventIntervalLabel.innerHTML = langArray.eventInterval;
  eventDurationLabel.innerHTML = langArray.eventDuration;
  chooseEventDesc.innerHTML = langArray.chooseEvents;
  lightsOutLabel.innerHTML = langArray.lightsOut;
  doublePointsLabel.innerHTML = langArray.doublePoints;
  lockYLabel.innerHTML = langArray.lockY;
  invertAxisLabel.innerHTML = langArray.invertAxis;
  controlsDesc.innerHTML = langArray.controlsDesc;
  languageDesc.innerHTML = langArray.languageDesc;
  tabParameters.innerHTML = langArray.parameters;
  tabControls.innerHTML = langArray.controls;
  tabLanguage.innerHTML = langArray.language;
  tabTutorial.innerHTML = langArray.tutorial;
  gameStartText.innerHTML = langArray.startGame;
  upLabel.innerHTML = langArray.up;
  downLabel.innerHTML = langArray.down;
  leftLabel.innerHTML = langArray.left;
  rightLabel.innerHTML = langArray.right;
  easyOpt.innerHTML = langArray.easy;
  normalOpt.innerHTML = langArray.normal;
  hardOpt.innerHTML = langArray.hard;
  customOpt.innerHTML = langArray.custom;
  mainMenuPlay.innerHTML = langArray.play;
  mainMenuSettings.innerHTML = langArray.settings;
  settingsMenuBackText.innerHTML = langArray.back;
}

function updateParameters() {
  switch (difficultyValue) {
    case "Easy":
      asignParametersValues(1, 1, 25, 10, 5, true, false, true, false);
      break;

    case "Normal":
      asignParametersValues(2, 1, 15, 7, 5, true, true, true, false);
      break;

    case "Hard":
      asignParametersValues(2, 2, 15, 13, 5, true, true, true, true);
      break;
  }

  speedSliderText.innerHTML = speedControl.value;
  speedIncrementSliderText.innerHTML = speedIncrementControl.value;
  livesSliderText.innerHTML = livesControl.value;
}

function asignParametersValues(
  speed,
  speedIncrement,
  eventInterval,
  eventDuration,
  lives,
  lightsOut,
  doublePoints,
  lockY,
  invertAxis
) {
  speedControl.value = speed;
  speedIncrementControl.value = speedIncrement;
  eventIntervalControl.value = eventInterval;
  eventDurationControl.value = eventDuration;
  livesControl.value = lives;
  checkboxLightsOut.checked = lightsOut;
  checkboxDoublePoints.checked = doublePoints;
  checkboxLockY.checked = lockY;
  checkboxInvertAxis.checked = invertAxis;
}

function displayKeyControls() {
  for (let i = 0; i < controlButtons.length; i++) {
    awaitBindingResponse(controlButtons[i]);
  }

  setControls();
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

function setCookie(cname, cvalue) {
  document.cookie =
    cname + "=" + cvalue + "; expires=Tue, 19 Jan 2038 03:14:07 UTC";
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
