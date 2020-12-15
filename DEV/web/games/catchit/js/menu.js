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


var menuOpts = document.querySelectorAll(".js-menu-opt");
var previousTab = document.querySelector(menuOpts[0].dataset.tab);
displayMenuOpt(previousTab, menuOpts[0].dataset.tab);

var keyUp ;
var keyLeft ;
var keyDown;
var keyRight;
setControls();

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
  lang = navigator.language.substring(0, 2);
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
        break;
  }
}

function updateParameters() {
  switch (difficultyValue) {
    case "Easy":
      asignParametersValues(1, 1, 25, 10, 5, true, false, true, false);
      break;

    case "Normal":
      asignParametersValues(1, 1, 15, 7, 5, true, true, true, false);
      break;

    case "Hard":
      asignParametersValues(3, 2, 15, 13, 5, true, true, true, true);
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
  document.cookie = cname + "=" + cvalue + "; expires=Tue, 19 Jan 2038 03:14:07 UTC" ;
}

function setControls(){
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
