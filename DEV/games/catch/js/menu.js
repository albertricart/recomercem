var speedControl = document.getElementById("speed");
var speedIncrementControl = document.getElementById("speedIncrement");
var livesControl = document.getElementById("chooseLives");
var difficultyControl = document.getElementById("difficulty");
var eventDurationControl = document.getElementById("eventInterval");
var eventIntervalControl = document.getElementById("eventDuration");
var speedSliderText = document.querySelector(".slideSpeed-value");
var speedIncrementSliderText = document.querySelector(".speedIncrement-value");
var livesSliderText = document.querySelector(".chooseLives-value");
var difficultyValue = difficultyControl.value;
var output = document.getElementById("demo");
var menuOpts = document.querySelectorAll(".js-menu-opt");
var previousTab = document.querySelector(menuOpts[0].dataset.tab);
displayMenuOpt(previousTab, menuOpts[0].dataset.tab);


difficultyControl.oninput = function () {
  difficultyValue = difficultyControl.value;
  updateParameters();
};

eventDurationControl.oninput = function () {
  difficultyControl.value = "Custom";
  speedSliderText.innerHTML = speedControl.value;
};

eventIntervalControl.oninput = function () {
  difficultyControl.value = "Custom";
  speedSliderText.innerHTML = speedControl.value;
};


speedControl.oninput = function () {
  difficultyControl.value = "Custom";
  speedSliderText.innerHTML = speedControl.value;
};

speedIncrementControl.oninput = function () {
  difficultyControl.value = "Custom";
  speedIncrementSliderText.innerHTML = speedIncrementControl.value;
};


livesControl.oninput = function () {
  difficultyControl.value = "Custom";
  livesSliderText.innerHTML = livesControl.value;
};


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
      break;

    case "#tabLang":
      break;

    case "#tabTuto":
      break;
  }
}

function updateParameters() {
  switch (difficultyValue) {
    case "Easy":
      speedControl.value = 1;
      speedIncrementControl.value = 1;
      eventIntervalControl.value = 60;
      eventDurationControl.value = 10;
      livesControl.value = 5;
      break;

    case "Normal":
      speedControl.value = 3;
      speedIncrementControl.value = 1;
      eventIntervalControl.value = 30;
      eventDurationControl.value = 10;
      livesControl.value = 5;
      break;

    case "Hard":
      speedControl.value = 4;
      speedIncrementControl.value = 2;
      eventIntervalControl.value = 20;
      eventDurationControl.value = 15;
      livesControl.value = 5;
      break;
  }

  speedSliderText.innerHTML = speedControl.value;
  speedIncrementSliderText.innerHTML = speedIncrementControl.value;
  livesSliderText.innerHTML = livesControl.value;
}