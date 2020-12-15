//get elements references
var gameContainer = document.querySelector(".game-container");
var infoContainer = document.querySelector(".game-info");
var parametersContainer = document.querySelector(".game-parameters");
var displayTimer = document.querySelector("#timeElapsed");
var displayPoints = document.querySelector("#points");
var displayLives = document.querySelector("#lives");
var displayEventTime = document.querySelector("#eventTime");
var basket = document.querySelector(".game-container__basket");
var menu = document.querySelector(".menu");
var menuStart = document.querySelector(".menu-start");
var menuWrapper = document.querySelector(".menu-wrapper");
var fab = document.querySelector(".fab-container");
fab.style.display = "none";
var settingsFab = document.querySelector("#settings");
var availableEvents = document.querySelectorAll(".eventCheckbox");
var selectedEvents = [];
var objects = document.querySelectorAll(".game-container__object");

//events id
const EVENT_OBSCURE = 1;
const DOUBLE_POINTS = 2;
const CONTROLS_INVERTED = 3;
const LOCK_Y = 4;
const DODGE = 5;

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
var lives;
var objectRendererId;
var timerId;
//get window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
var pointsToAdd = 1;

//get game container size
var gameWidth = gameContainer.offsetWidth;
var gameHeight = gameContainer.offsetHeight;

window.onresize = reportWindowSize;

settingsFab.addEventListener("click", function () {
  lives = 0;
  openMenu();
});
window.addEventListener("mousemove", handleMouseMove);
document.addEventListener("keypress", handleKeyPress);
menuStart.addEventListener("click", function () {
  closeMenu();
  setTimeout(function () {
    startgame(initObjects, moveObjects, setParameters);
  }, 1000);
});

//MAIN APP
openMenu();

/**
 *
 *  HANDLE OBJECTS
 *
 */

function initObjects() {
  //get bomb index from last game
  let bombIndex = returnBomb();
  //if there is bomb
  if(bombIndex != -1){
    //delete bomb
    removeBomb(objects[bombIndex]);
  }

  //position each object
  for (i = 0; i < objects.length; i++) {
    objects[i].style.backgroundImage = getRandomObjectUrl();
    objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";

    if (i == 0) {
      objects[i].style.left = gameWidth * 0.05 + "px";
    } else {
      objects[i].style.left =
        parseFloat(objects[i - 1].style.left) + (gameWidth) / 5 + "px";
    }
  }

  //set bomb on random object
  setBomb(objects[getRandomInt(0, objects.length - 1)]);
  gameContainer.style.cursor = "none";
  basket.style.display = "block";
}

function setBomb(object) {
  object.dataset.objectType = "B";
  object.style.backgroundImage = "url(./assets/objects/bomb.png)";
}

function isBomb(object) {
  if (object.dataset.objectType == "B") {
    return true;
  } else {
    return false;
  }
}

function returnBomb() {
  for (let i = 0; i < objects.length; i++) {
    if (isBomb(objects[i])) {
      return i;
    }
  }
  return -1;
}

function removeBomb(object) {
  object.dataset.objectType = "O";
  object.style.backgroundImage = getRandomObjectUrl();
}


function moveObjects() {
  objectRendererId = setInterval(function () {
    if (lives != 0) {
      for (let i = 0; i < objects.length; i++) {
        //if object gets to bottom, remove life and get back to top
        if (parseFloat(objects[i].style.top) >= gameHeight) {
          if (isBomb(objects[i])) {
            removeBomb(objects[i]);
          } else {
            removeLife(1);
            objects[i].style.backgroundImage = getRandomObjectUrl();
          }

          objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";
        } else {
          
          if (returnBomb() == -1 && parseFloat(objects[i].style.top) <= (-objects[i].getBoundingClientRect().height)) {
            setBomb(objects[i]);
          }

          if (checkCollision(basket, objects[i])) {
            //if objects collide
            if (isBomb(objects[i])) {
              removeLife(1);
              removeBomb(objects[i]);
            } else {
              addPoints(pointsToAdd);
              objects[i].style.backgroundImage = getRandomObjectUrl();
            }

            objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";
          } else {
            //if object is above bottom and hasn't collided keep moving
            objects[i].style.top = parseFloat(objects[i].style.top) + (speed*speedIncrement.value) + "px";
          }
        }
      }
    } else {
      gameContainer.style.cursor = "auto";
      basket.style.display = "none";
      clearInterval(objectRendererId);
      clearInterval(timerId);
      clearInterval(eventGeneratorId);
      eventTimer = 0;
      selectedEvents.splice(0,selectedEvents.length);  
      openMenu();
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
    return true;
  } else {
    return false;
  }
}



/**
 *
 *  MAIN GAME FUNCTIONS
 *
 */

function startgame(initObjects, moveObjects, setParameters) {
  startTimer();
  setParameters(
    1,
    eventIntervalControl.value,
    eventDurationControl.value,
    livesControl.value,
    0
  );
  initObjects();
  moveObjects();
  eventGeneratorId = setInterval(function () {
    triggerEvent(selectedEvents[getRandomInt(0, selectedEvents.length)]);
  }, eventInterval * 1000);
}

function startTimer() {
  timeElapsed = 0;
  eventTimer = 0;
  var nextEvent = eventInterval;
  timerId = setInterval(function () {
    if (lives != 0) {
      timeElapsed += 0.01;
      displayTimer.innerHTML = timeElapsed.toFixed(2) + "s";

      if(timeElapsed%eventInterval == 0 || timeElapsed == 0){
        displayEventTime.innerHTML = nextEvent--;
        setTimeout(function(e){
          nextEvent = eventInterval;
        }, eventInterval*1000);
      }
      
    }
  }, 10);
}

function triggerEvent(eventId) {
  eventTimer = 0;
  eventTimerId = setInterval(function () {
    eventTimer++;
    displayEventTime.innerHTML = (eventDuration - eventTimer) + " current";

    switch (eventId) {
      case EVENT_OBSCURE:
        gameContainer.style.transition = "all 0.15s ease";
        gameContainer.style.backgroundColor = "rgba(0,0,0,.9)";
        basket.style.backgroundImage = "url(./assets/objects/dark/basket.png)";

        if (eventTimer == eventDuration || lives == 0) {
          gameContainer.style.backgroundColor = "palegreen";
          basket.style.backgroundImage = "url(./assets/objects/basket.png)";
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

/**
 *
 *  HANDLE USER INPUTS
 *
 */

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
      case keyUp:
        basket.style.top = offsets.top - 30 + "px";
        break;
      case keyLeft:
        //move left (X-)
        basket.style.left = offsets.left - 30 + "px";
        break;
      case keyDown:
        basket.style.top = offsets.top + 30 + "px";
        //move down (Y-)
        break;
      case keyRight:
        basket.style.left = offsets.left + 30 + "px";
        //move right (X+)
        break;
    }
  }
}

/**
 *
 *  MODIFY GAME
 *
 */

function addPoints(x) {
  points += x;
  increaseSpeed(0.01);
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


function getSelectedEvents(){
  var eventId;
  for(let i = 0; i < availableEvents.length; i++){
    if(availableEvents[i].checked){
      eventId = parseInt(availableEvents[i].dataset.eventid);
      selectedEvents.push(eventId);
    }
  }
}

/**
 *
 *  MENUS
 *
 */

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

/**
 *
 *  MISC
 *
 */

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function reportWindowSize() {
  windowWidth = window.innerWidth;
  windowHeight = window.innerHeight;

  gameWidth = gameContainer.offsetWidth;
  gameHeight = gameContainer.offsetHeight;

  for (let i = 0; i < objects.length; i++) {
    if (i == 0) {
      objects[i].style.left = gameWidth * 0.05 + "px";
    } else {
      objects[i].style.left =
        parseFloat(objects[i - 1].style.left) + (gameWidth * 1.05) / 5 + "px";
    }
  }

  console.log(
    "Window resized to " + "(" + windowWidth + ", " + windowHeight + ")"
  );
  console.log("Game resized to " + "(" + gameWidth + ", " + gameHeight + ")");
}

function setParameters(speed, eventInterval, eventDuration, lives, points) {
  this.speed = speed;
  this.lives = lives;
  this.points = points;
  this.eventInterval = eventInterval;
  this.eventDuration = eventDuration;
  getSelectedEvents();

  displayLives.innerHTML = lives;
  displayPoints.innerHTML = points;
}

function animateInfo(info, color, animation) {
  info.style.color = color;
  setTimeout(function () {
    info.style.color = "white";
    info.classList.remove(animation);
  }, 1000);
  info.classList.add(animation);
}



function getRandomObjectUrl() {
  //var objectName = "url(./assets/objects/" + files[getRandomInt(0, files.length)] + ")";
  var returnUrl;
  switch (getRandomInt(0, 10)) {
    case 0:
      returnUrl = "url(./assets/objects/hat.png)";
      break;

    case 1:
      returnUrl = "url(./assets/objects/apple.png)";
      break;

    case 2:
      returnUrl = "url(./assets/objects/banana.png)";
      break;

    case 3:
      returnUrl = "url(./assets/objects/pear.png)";
      break;

    case 4:
      returnUrl = "url(./assets/objects/orange.png)";
      break;

    case 5:
      returnUrl = "url(./assets/objects/dress.png)";
      break;

    case 6:
      returnUrl = "url(./assets/objects/shirt.png)";
      break;

    case 7:
      returnUrl = "url(./assets/objects/shirt2.png)";
      break;

    case 8:
      returnUrl = "url(./assets/objects/pants1.png)";
      break;

    case 9:
      returnUrl = "url(./assets/objects/pants2.png)";
      break;

    case 10:
      returnUrl = "url(./assets/objects/shoe2.png)";
      break;
  }

  return returnUrl;
  
}
