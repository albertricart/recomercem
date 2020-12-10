//get elements references
var gameContainer = document.querySelector(".game-container");
var infoContainer = document.querySelector(".game-info");
var parametersContainer = document.querySelector(".game-parameters");
var displayTimer = document.querySelector("#timeElapsed");
var displayPoints = document.querySelector("#points");
var displayLives = document.querySelector("#lives");
var displayEvent = document.querySelector("#eventTimeLeft");
var objects = document.querySelectorAll(".game-container__object");
var basket = document.querySelector(".game-container__basket");
var menu = document.querySelector(".menu");
var menuStart = document.querySelector(".menu-start");
var controlsOpt = document.querySelector("#controls_opt");
var menuWrapper = document.querySelector(".menu-wrapper");
var controlButtons = document.querySelectorAll(".control-binding");
var fab = document.querySelector(".fab-container");
fab.style.display = "none";
var settingsFab = document.querySelector("#settings");

//https://www.w3schools.com/js/js_cookies.asp
document.cookie = "keyUp=W";
document.cookie = "keyLeft=A";
document.cookie = "keyDown=S";
document.cookie = "keyRight=D";

//events id
const EVENT_OBSCURE = 1;
const DOUBLE_POINTS = 2;
const CONTROLS_INVERTED = 3;
const LOCK_Y = 4;

//event time interval(s)
var eventInterval = 10;
//event time duration(s)
var eventDuration = 5;
var eventTimerId;
var eventGeneratorId;
var eventTimer;
//game speed
var speed;
//time since game started
var timeElapsed;
var points;
var lives = 0;
var objectRendererId;
var timerId;
//get window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
var pointsToAdd = 1;

//get game container size
var gameWidth = gameContainer.offsetWidth;
var gameHeight = gameContainer.offsetHeight;

//get game info container size
var infoWidth = infoContainer.offsetWidth;
var infoHeight = infoContainer.offsetHeight;

//default keyboard controls
var keyUp = "W";
var keyLeft = "A";
var keyDown = "S";
var keyRight = "D";

window.onresize = reportWindowSize;
settingsFab.addEventListener("click", function () {
  lives = 0;
  initObjects();
  openMenu();
});
window.addEventListener("mousemove", handleMouseMove);
document.addEventListener("keypress", handleKeyPress);
for (let i = 0; i < controlButtons.length; i++) {
  switch (i) {
    case 0:
      controlButtons[i].innerHTML = keyUp;
      break;
    case 1:
      controlButtons[i].innerHTML = keyLeft;
      break;
    case 2:
      controlButtons[i].innerHTML = keyRight;
      break;
    case 3:
      controlButtons[i].innerHTML = keyDown;
      break;
  }

  controlButtons[i].addEventListener(
    "click",
    awaitBindingResponse(controlButtons[i])
  );
}

menuStart.addEventListener("click", function () {
  closeMenu();
  setTimeout(function () {
    startgame(initObjects, moveObjects, setParameters);
  }, 1000);
});

openMenu();

function initObjects() {
  //position each object
  for (i = 0; i < objects.length; i++) {
    objects[i].style.top = "-50px";
    // objects[i].style.left = ((gameWidth/(5*(parseInt(objects[i]).getBoundingClientRect().width))) + (i*(gameWidth / 5))) + "px";
    objects[i].style.left = i * (gameWidth / 5) + "px";
  }

  gameContainer.style.cursor = "none";
  basket.style.display = "block";
}

function moveObjects(objects) {
  objectRendererId = setInterval(function () {
    if (lives != 0) {
      for (i = 0; i < objects.length; i++) {
        if (!checkCollision(basket, objects[i])) {
          if (parseInt(objects[i].style.top) >= gameHeight) {
            objects[i].style.top = "-50px";
            removeLife(1);
          } else {
            objects[i].style.top =
              parseInt(objects[i].style.top) + speed + "px";
          }
        } else {
          objects[i].style.top = "-50px";
        }
      }
    } else {
      gameContainer.style.cursor = "auto";
      basket.style.display = "none";
      clearInterval(objectRendererId);
      clearInterval(timerId);
      clearInterval(eventGeneratorId);
      clearInterval(eventTimerId);
      openMenu();
    }
  }, 10);
}

function startgame(initObjects, moveObjects, setParameters) {
  initObjects(objects);
  moveObjects(objects);
  startTimer();
  setParameters(1, 5, 0);
  eventGeneratorId = setInterval(function () {
    var random = Math.floor(Math.random() * 3) + 1;
    triggerEvent(random);
  }, eventInterval * 1000);
}

function reportWindowSize() {
  windowWidth = window.innerWidth;
  windowHeight = window.innerHeight;

  gameWidth = gameContainer.offsetWidth;
  gameHeight = gameContainer.offsetHeight;

  for (i = 0; i < objects.length; i++) {
    objects[i].style.left = i * (gameWidth / 5) + "px";
  }

  console.log(
    "Window resized to " + "(" + windowWidth + ", " + windowHeight + ")"
  );
  console.log("Game resized to " + "(" + gameWidth + ", " + gameHeight + ")");
}

function setParameters(speed, lives, points) {
  this.speed = speed;
  this.lives = lives;
  this.points = points;

  displayLives.innerHTML = lives;
  displayPoints.innerHTML = points;
}

function triggerEvent(eventId) {
  eventTimer = 0;
  eventTimerId = setInterval(function () {
    eventTimer++;
    displayEvent.innerHTML = eventDuration - eventTimer;

    switch (eventId) {
      case EVENT_OBSCURE:
        gameContainer.style.transition = "all 0.15s ease";
        gameContainer.style.backgroundColor = "rgba(0,0,0,.9)";
        basket.style.backgroundImage = "url(./assets/basket-dark.png)";

        if (eventTimer == eventDuration || lives == 0) {
          gameContainer.style.backgroundColor = "palegreen";
          basket.style.backgroundImage = "url(./assets/basket.png)";
          clearInterval(eventTimerId);
        }
        break;

      case DOUBLE_POINTS:
        pointsToAdd = 2;
        if (eventTimer == eventDuration || lives == 0) {
          pointsToAdd = 1;
          clearInterval(eventTimerId);
        }
        break;

      case CONTROLS_INVERTED:
        window.removeEventListener("mousemove", handleMouseMove);
        window.addEventListener("mousemove", handleInvertedMouseMove);

        if (eventTimer == eventDuration || lives == 0) {
          window.removeEventListener("mousemove", handleInvertedMouseMove);
          window.addEventListener("mousemove", handleMouseMove);
          clearInterval(eventTimerId);
        }
        break;

        case LOCK_Y:
        window.removeEventListener("mousemove", handleMouseMove);
        window.addEventListener("mousemove", handleLockedMouseMove);

        if (eventTimer == eventDuration || lives == 0) {
          window.removeEventListener("mousemove", handleLockedMouseMove);
          window.addEventListener("mousemove", handleMouseMove);
          clearInterval(eventTimerId);
        }
        break;
    }
  }, 1000);
}

function startTimer() {
  timeElapsed = 0;
  timerId = setInterval(function () {
    if (lives != 0) {
      timeElapsed += 0.01;
      displayTimer.innerHTML = timeElapsed.toFixed(2) + "s";
    }
  }, 10);
}

function checkCollision(basket, object) {
  var basketOffsets = basket.getBoundingClientRect();
  var objectOffsets = object.getBoundingClientRect();

  if (
    objectOffsets.left + objectOffsets.width > basketOffsets.left &&
    objectOffsets.left + objectOffsets.width <
      basketOffsets.left + basketOffsets.width &&
    objectOffsets.top + objectOffsets.height < basketOffsets.bottom &&
    objectOffsets.top + objectOffsets.height >
      basketOffsets.top + 0.6 * basketOffsets.height
  ) {
    addPoints(pointsToAdd);

    return true;
  } else {
    return false;
  }
}

function handleMouseMove(e) {
  if (
    e.pageY <= gameHeight - basket.getBoundingClientRect().height + 15 &&
    e.pageX <= gameWidth - basket.getBoundingClientRect().width
  ) {
    // e = Mouse move event.
    basket.style.top = e.pageY + "px";
    basket.style.left = e.pageX + "px";
  }
}

function handleInvertedMouseMove(e) {
  if (
    e.pageY <= gameHeight - basket.getBoundingClientRect().height + 15 &&
    e.pageX <= gameWidth - basket.getBoundingClientRect().width
  ) {
    // e = Mouse move event.
    basket.style.top = e.pageX + "px";
    basket.style.left = e.pageY + "px";
  }
}

function handleLockedMouseMove(e) {
  if (
    e.pageY <= gameHeight - basket.getBoundingClientRect().height + 15 &&
    e.pageX <= gameWidth - basket.getBoundingClientRect().width
  ) {
    // e = Mouse move event.
    basket.style.left = e.pageX + "px";
  }
}

function handleKeyPress(e) {
  // e = keypress event.
  var key = "Key";
  let offsets = basket.getBoundingClientRect();

  if (
    offsets.top - 30 < 0 ||
    offsets.left - 15 < 0 ||
    offsets.top >= gameHeight - offsets.height ||
    offsets.left >= gameWidth - offsets.width
  ) {
    basket.style.top = "0px";
    basket.style.left = "0px";
    basket.style.right = "0px";
    basket.style.bottom = "0px";
  } else {
    switch (e.code) {
      case key.concat(keyUp):
        basket.style.top = offsets.top - 30 + "px";
        break;
      case key.concat(keyLeft):
        //move left (X-)
        basket.style.left = offsets.left - 30 + "px";
        break;
      case key.concat(keyDown):
        basket.style.top = offsets.top + 30 + "px";
        //move down (Y-)
        break;
      case key.concat(keyRight):
        basket.style.left = offsets.left + 30 + "px";
        //move right (X+)
        break;
    }
  }
}

function addPoints(x) {
  points += x;
  //increaseSpeed(0.1);
  if (points % 10 == 0) {
    animateInfo(displayPoints, "#FFD700", "animate__pulse");
    
  }
  displayPoints.innerHTML = points;
}

function increaseSpeed(x) {
  speed += x;
}

function removeLife(lifesToRemove) {
  lives -= lifesToRemove;
  if (lives < 0) {
    lives = 0;
  }

  animateInfo(displayLives, "red", "animate__heartBeat");
  displayLives.innerHTML = lives;
}

function openMenu() {
  hideFab();
  menuWrapper.style.visibility = "visible";
  menuWrapper.classList.add("animate__fadeIn");
  menuWrapper.classList.remove("animate__fadeOut");
  menu.classList.remove("animate__fadeOutDown");
  menu.classList.add("animate__fadeInDown");
}

function closeMenu() {
  showFab();
  menuWrapper.classList.add("animate__fadeOut");
  menuWrapper.classList.remove("animate__fadeIn");
  menu.classList.add("animate__fadeOutDown");
  menu.classList.remove("animate__fadeInDown");
  setTimeout(function () {
    menuWrapper.style.visibility = "hidden";
  }, 1000);
}

function showFab() {
  fab.style.display = "block";
  fab.classList.add("animate__slideInUp");
  fab.classList.remove("animate__fadeOutDown");
}

function hideFab() {
  fab.classList.add("animate__fadeOutDown");
  fab.classList.remove("animate__slideInUp");
  setTimeout(function () {
    fab.style.display = "none";
  }, 1000);
}

function awaitBindingResponse(elem) {
  elem.innerHTML = "Waiting key press...";
  elem.addEventListener("keypress", function (e) {
    elem.innerHTML = e.code.replace("Key", "");
  });
}

function animateInfo($info, $color, $animation) {
  $info.style.color = $color;
  setTimeout(function () {
    $info.style.color = "white";
    $info.classList.remove($animation);
  }, 1000);
  $info.classList.add($animation);
}
