//get elements references
var gameContainer = document.querySelector(".game-container");
var infoContainer = document.querySelector(".game-info");
var parametersContainer = document.querySelector(".game-parameters");
var displayTimer = document.querySelector("#timeElapsed");
var displayPoints = document.querySelector("#points");
var displayLives = document.querySelector("#lives");
var displayEvent = document.querySelector("#event");
var objects = document.querySelectorAll(".game-container__object");
var basket = document.querySelector(".game-container__basket");
var menu = document.querySelector(".menu");
var menuStart = document.querySelector(".menu-start");
var controlsOpt = document.querySelector("#controls_opt");
var menuWrapper = document.querySelector(".menu-wrapper");
var controlButtons = document.querySelectorAll(".control-binding");


//https://www.w3schools.com/js/js_cookies.asp
document.cookie = "keyUp=W";
document.cookie = "keyLeft=A";
document.cookie = "keyDown=S";
document.cookie = "keyRight=D";

//CONSTS
//event time interval(ms)
const EVENT_INTERVAL = 10000;
//events id
const EVENT0 = 0;
const EVENT1 = 1;
const EVENT2 = 2;
const EVENT3 = 3;
const EVENT4 = 4;

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
document.addEventListener("mousemove", handleMouseMove);
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
  startgame(initObjects, moveObjects, setParameters);
});

openMenu();

function initObjects(objects) {
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
      openMenu();
    }
  }, 10);
}

function startgame(initObjects, moveObjects, setParameters) {
  initObjects(objects);
  moveObjects(objects);
  startTimer();
  setParameters(2, 5, 0);
  window.setInterval(function () {
    var event = Math.floor(Math.random() * 4) + 1;
    triggerEvent(event);
  }, EVENT_INTERVAL);
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

function triggerEvent(event) {
  switch (event) {
    case EVENT0:
      displayTimer.backgroundColor = "red";
      break;
    case EVENT1:
      displayTimer.backgroundColor = "red";
      break;
    case EVENT2:
      displayTimer.backgroundColor = "green";
      break;
    case EVENT3:
      displayTimer.backgroundColor = "blue";
      break;
    case EVENT4:
      displayTimer.backgroundColor = "yellow";
      break;
  }
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
      basketOffsets.top + 0.8 * basketOffsets.height
  ) {
    addPoints(1);

    return true;
  } else {
    return false;
  }
}

function addPoints(pointsToAdd) {
  points += pointsToAdd;
  if (points % 10 == 0) {
    animateInfo(displayPoints, "#FFD700", "animate__pulse");
  }
  displayPoints.innerHTML = points;
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
  menuWrapper.style.visibility = "visible";
  menuWrapper.classList.add("animate__fadeIn");
  menuWrapper.classList.remove("animate__fadeOut");
  menu.classList.remove("animate__fadeOutDown");
  menu.classList.add("animate__fadeInDown");
}

function closeMenu() {
  menuWrapper.classList.add("animate__fadeOut");
  menuWrapper.classList.remove("animate__fadeIn");
  menu.classList.add("animate__fadeOutDown");
  menu.classList.remove("animate__fadeInDown");
  setTimeout(function () {
    menuWrapper.style.visibility = "hidden";
  }, 1000);
}

function awaitBindingResponse(elem) {
  elem.innerHTML = "Waiting key press...";
  elem.addEventListener("keypress", function (e) {
    elem.innerHTML = e.code.replace("Key", "");
  });
}

function handleMouseMove(e) {
  // e = Mouse move event.
  basket.style.top = e.pageY + "px";
  basket.style.left = e.pageX + "px";
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

function animateInfo($info, $color, $animation) {
  $info.style.color = $color;
  setTimeout(function () {
    $info.style.color = "white";
    $info.classList.remove($animation);
  }, 1000);
  $info.classList.add($animation);
}
