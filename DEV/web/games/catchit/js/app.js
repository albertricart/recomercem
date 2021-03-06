/*========= MENUS =========*/
var mainMenu = document.querySelector(".main-menu");
var settingsMenu = document.querySelector(".settings-menu");
var gameOver = document.querySelector(".game-over");
var menuWrapper = document.querySelector(".menu-wrapper");
var mainMenuPlay = document.querySelector(".main-menu-game-start");
var mainMenuSettings = document.querySelector(".main-menu-game-settings");
var settingsMenuBack = document.querySelector(".settings-menu-back");

/*========= SOUNDS =========*/
var coinSound = new Audio('./sounds/coin.mp3');
var gameOverSound = new Audio('./sounds/gameover.wav');
var bombSound = new Audio('./sounds/bomb.mp3');

/*========= OBJECTS =========*/
var objectNames = ["apple", "banana", "dress", "hat", "orange", "pants1", "pants2", "pear", "shirt", "shirt2", "shoe2", "shoe3", "skirt", "watermelon", "martillo", "lettuce", "tomato", "carrot", "coffee", "newspaper", "beer"];

/*========= SELECTORS =========*/
//get elements references
var gameContainer = document.querySelector(".game-container");
var displayTimer = document.querySelector("#timeElapsed");
var displayPoints = document.querySelector("#points");
var displayLives = document.querySelector("#lives");
var displayEventTime = document.querySelector("#eventTime");
var eventIcon = document.querySelector(".game-info__event__icon");
var basket = document.querySelector(".game-container__basket");
var fab = document.querySelector(".fab-container");
var settingsFab = document.querySelector("#settings");
var availableEvents = document.querySelectorAll(".eventCheckbox");
var selectedEvents = [];
var objects = document.querySelectorAll(".game-container__object");
var imgs;

/*========= EVENT ID'S =========*/
const EVENT_OBSCURE = 1;
const DOUBLE_POINTS = 2;
const LOCK_Y = 3;
const CONTROLS_INVERTED = 4;
const DODGE = 5;


/*========= GAME VARIABLES =========*/
//current game ID
var currentEvent = 0;
//default event time interval(s)
var eventInterval = 10;
//default event time duration(s)
var eventDuration = 5;
//id for setIntervals
var eventTimerId;
var eventGeneratorId;
var objectRendererId;
//time since event started
var eventTimer;
//game speed
var speed;
var speedIncrement;
//time since game started
var timeElapsed;
var points;
var pointsToAdd = 5;
var lives;
var timerId;
//get window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

//get game container size
var gameWidth = gameContainer.offsetWidth;
var gameHeight = gameContainer.offsetHeight;

//console log window size
window.onresize = reportWindowSize;


//add game controls
window.addEventListener("mousemove", handleMouseMove);
window.addEventListener("keypress", handleKeyPress);

//end game when user clicks on fab -> settings
settingsFab.addEventListener("click", function () {
  lives = 0;
  openSettingsMenu();
});


/*========= MAIN APP =========*/
openMainMenu();






/**
 *
 *  MAIN GAME FUNCTIONS
 *
 */

//receives functions by parameter and performs callbacks
function startgame(initObjects, moveObjects, setParameters, startTimer, manageEvents) {
  setParameters(
    parseInt(speedControl.value),
    parseInt(speedIncrementControl.value) / 100,
    parseInt(eventIntervalControl.value),
    parseInt(eventDurationControl.value),
    parseInt(livesControl.value),
    0
  );
  startTimer();
  initObjects();
  moveObjects();
  manageEvents();
}

//triggers an event at a determined interval
function manageEvents() {
  if (selectedEvents.length != 0) {
    eventGeneratorId = setInterval(function () {
      triggerEvent(selectedEvents[getRandomInt(0, selectedEvents.length - 1)]);
    }, (eventInterval * 1000));
  }
}

//game timer and event time manager
function startTimer() {
  timeElapsed = 0;
  eventTimer = 0;
  var nextEvent = eventInterval;
  timerId = setInterval(function () {
    if (lives != 0) {
      timeElapsed += 0.01;
      displayTimer.innerHTML = timeElapsed.toFixed(2) + "s";

      if (eventTimer == eventDuration) {
        eventTimer = 0;
        nextEvent = eventInterval - eventDuration;
      }

      if (currentEvent == 0) {
        nextEvent -= 0.01;
        displayEventTime.innerHTML = langArray.next + nextEvent.toFixed(0) + "s";
      } else {
        displayEventTime.innerHTML = langArray.current + ": " + (eventDuration - eventTimer).toFixed(0) + "s";
      }
    }
  }, 10);
}

//triggers the given event
function triggerEvent(eventId) {
  eventTimer = 0;
  auxSpeed = speed;
  currentEvent = eventId;
  var eventName;

  eventTimerId = setInterval(function () {
    eventTimer++;
    if (eventTimer == eventDuration || lives == 0) clearEvent(currentEvent);
  }, 1000);


  switch (eventId) {
    case EVENT_OBSCURE:
      objects.forEach(object => {
        object.style.backgroundImage = getObjectUrl(object.dataset.objectimg, true);
      });

      eventName = "lightsOut";
      gameContainer.style.backgroundImage = "url(./assets/back-dark.png)";
      eventIcon.style.backgroundImage = "url(./assets/lights-out.png)";
      basket.style.backgroundImage = "url(./assets/objects/dark/basket.png)";

      break;

    case DOUBLE_POINTS:
      pointsToAdd = 10;
      eventName = "doublePoints";
      eventIcon.style.backgroundImage = "url(./assets/double-points.png)";
      break;

    case CONTROLS_INVERTED:
      eventName = invertAxis;
      speed = 1;
      eventIcon.style.backgroundImage = "url(./assets/invert.png)";
      window.removeEventListener("mousemove", handleMouseMove);
      window.addEventListener("mousemove", handleInvertedMouseMove);
      break;

    case LOCK_Y:
      eventName = "lockY";
      eventIcon.style.backgroundImage = "url(./assets/lock.png)";
      window.removeEventListener("mousemove", handleMouseMove);
      window.addEventListener("mousemove", handleLockedMouseMove);
      break;

    case DODGE:
      eventName = "dodge";
      eventIcon.style.backgroundImage = "url(./assets/objects/bomb.png)";
      setTimeout(function () {
        objects.forEach(object => {
          if (isBomb(object)) {
            removeBomb(object);
          } else {
            setBomb(object);
          }
        });
      }, 1000);

      break;
  }

  document.querySelector(".currentEventName").innerHTML = langArray[eventName];
}

//clears the given event
function clearEvent(event) {
  eventIcon.style.backgroundImage = "none";
  document.querySelector(".currentEventName").innerHTML = "";
  clearInterval(eventTimerId);
  currentEvent = 0;
  nextEvent = eventInterval;
  switch (event) {
    case EVENT_OBSCURE:
      objects.forEach(object => {
        object.style.backgroundImage = getObjectUrl(object.dataset.objectimg, false);
      });

      gameContainer.style.backgroundImage = "url(./assets/back.png)";
      basket.style.backgroundImage = "url(./assets/objects/basket.png)";
      break;

    case DOUBLE_POINTS:
      pointsToAdd = 5;
      break;

    case CONTROLS_INVERTED:
      window.removeEventListener("mousemove", handleInvertedMouseMove);
      window.addEventListener("mousemove", handleMouseMove);
      speed = auxSpeed;
      break;

    case LOCK_Y:
      window.removeEventListener("mousemove", handleLockedMouseMove);
      window.addEventListener("mousemove", handleMouseMove);
      break;
  }
}

/**
 *
 *  HANDLE OBJECTS
 *
 */

function initObjects() {
  //get bomb index from last game
  let bombIndex = returnBomb();
  //if there is bomb
  if (bombIndex != -1) {
    //delete bomb
    removeBomb(objects[bombIndex]);
  }


  for (i = 0; i < objects.length; i++) {
    //give image to object 
    setObjectImage(objects[i], getRandomObjectName());

    //position each object
    if (i == 0) {
      objects[i].style.left = gameWidth * 0.05 + "px";
    } else {
      objects[i].style.left = parseFloat(objects[i - 1].style.left) + gameWidth / 5 + "px";
    }
    objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";
  }

  //set bomb on random object
  setBomb(objects[getRandomInt(0, objects.length - 1)]);

  //hide cursor
  gameContainer.style.cursor = "none";
  //show basket
  basket.style.display = "block";
}

function setBomb(object) {
  object.dataset.objecttype = "B";
  object.dataset.objectimg = "bomb";
  object.style.backgroundImage = "url(./assets/objects/bomb.png)";
}

function isBomb(object) {
  if (object.dataset.objecttype == "B") {
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
  object.dataset.objecttype = "O";
  setObjectImage(object, getRandomObjectName());
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
            setObjectImage(objects[i], getRandomObjectName());
          }

          objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";

        } else {
          if (
            returnBomb() == -1 &&
            parseFloat(objects[i].style.top) <=
            -objects[i].getBoundingClientRect().height
          ) {
            setBomb(objects[i]);
          }

          //if players collides with the given object, remove life and get back to top
          if (checkCollision(basket, objects[i])) {
            //check if bomb
            if (isBomb(objects[i])) {
              removeLife(1);
              removeBomb(objects[i]);
            } else {
              addPoints(pointsToAdd);
              setObjectImage(objects[i], getRandomObjectName());
            }

            objects[i].style.top = -(getRandomInt(1, 5) * 100) + "px";
          } else {
            //if object is above bottom and hasn't collided keep moving
            objects[i].style.top = parseFloat(objects[i].style.top) + speed + "px";
          }
        }
      }
    } else {
      //game ended
      openGameOver();
    }
  }, 10);
}

//checks if basket and given object collide and returns bool
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

//set object image with given name
function setObjectImage(object, objectName) {
  object.dataset.objectimg = objectName;

  if (currentEvent == EVENT_OBSCURE) {
    object.style.backgroundImage = getObjectUrl(objectName, true);
  } else {
    object.style.backgroundImage = getObjectUrl(objectName, false);
  }

}

//returns a random object name
function getRandomObjectName() {
  return objectNames[getRandomInt(0, objectNames.length - 1)];
}

//get object image url
function getObjectUrl(objectName, dark) {
  if (dark) {
    return "url(./assets/objects/dark/" + objectName + ".png)";
  } else {
    return "url(./assets/objects/" + objectName + ".png)";
  }
}



/**
 *
 *  HANDLE USER INPUTS
 *
 */

function handleMouseMove(e) {
  // e = Mouse move event.
  basket.style.top = e.pageY + "px";
  basket.style.left = e.pageX + "px";
}

function handleInvertedMouseMove(e) {
  // e = Mouse move event.
  basket.style.top = e.pageX + "px";
  basket.style.left = e.pageY + "px";
}

function handleLockedMouseMove(e) {
  if (e.pageY <= gameHeight && e.pageX <= gameWidth) {
    // e = Mouse move event.
    basket.style.left = e.pageX + "px";
  }
}

function handleKeyPress(e) {
  // e = keypress event.
  let offsets = basket.getBoundingClientRect();

  if (offsets.top < 0) {
    basket.style.top = "30px";
  } else if (offsets.left < 0) {
    basket.style.left = "0px";
  } else if (offsets.top > gameHeight) {
    basket.style.top = (gameHeight - offsets.height ) + "px";
  } else if (offsets.left > gameWidth - offsets.width) {
    basket.style.left = (gameWidth - offsets.width - 10) + "px";
  } else {
    switch (e.code) {
      case keyUp:
        //move Up (Y+)
        basket.style.top = (offsets.top - 80) + "px";
        break;
      case keyLeft:
        //move left (X-)
        basket.style.left = offsets.left - 30 + "px";
        break;
      case keyDown:
        //move down (Y-)
        basket.style.top = (offsets.top + 30) + "px";
        break;
      case keyRight:
        //move right (X+)
        basket.style.left = offsets.left + 30 + "px";
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
  increaseSpeed(speedIncrement);
  if (points % 30 == 0) {
    animateInfo(displayPoints, "#a36d00", "animate__pulse");
    coinSound.play();
  }
  displayPoints.innerHTML = points;
}

function increaseSpeed(x) {
  speed += x;
}

function removeLife(lifesToRemove) {
  bombSound.play();
  lives -= lifesToRemove;
  if (lives < 0) {
    lives = 0;
  }

  animateInfo(displayLives, "red", "animate__heartBeat");
  displayLives.innerHTML = lives;
}

//get selected events from settings menu
function getSelectedEvents() {
  var eventId;
  for (let i = 0; i < availableEvents.length; i++) {
    if (availableEvents[i].checked) {
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

 //function to open and close menus with given animations
function manageMenu(elem, state, animIn, animOut) {
  switch (state) {
    //close
    case 0:
      elem.classList.add(animOut);
      elem.classList.remove(animIn);
      break;

    //open
    case 1:
      elem.classList.add(animIn);
      elem.classList.remove(animOut);
      break;
  }
}


function openMainMenu() {
  hideFab();
  //open mainMenu
  mainMenu.style.display = "flex";
  manageMenu(mainMenu, 1, "animate__fadeInDown", "animate__fadeOutDown");

  mainMenuSettings.addEventListener("click", function () {
    openSettingsMenu(settingsMenu);
  });

  mainMenuPlay.addEventListener("click", function () {
    closeMainMenu();
    setTimeout(function () {
      startgame(initObjects, moveObjects, setParameters, startTimer, manageEvents);
      menuWrapper.style.display = "none";
      mainMenu.style.display = "none";
    }, 1000);
  });
}

function closeMainMenu() {
  showFab();
  //close mainMenu
  manageMenu(mainMenu, 0, "animate__fadeInDown", "animate__fadeOutDown");
  menuWrapper.style.cursor = "none";
}

function openGameOver() {
  gameContainer.style.cursor = "auto";
  basket.style.display = "none";
  clearInterval(objectRendererId);
  clearInterval(timerId);
  clearInterval(eventGeneratorId);
  eventTimer = 0;
  nextEvent = 0;
  selectedEvents.splice(0, selectedEvents.length);
  gameOverSound.play();

  menuWrapper.style.display = "block";
  menuWrapper.style.cursor = "auto";
  gameOver.style.visibility = "visible";
  manageMenu(gameOver, 1, "animate__fadeInDown", "animate__fadeOutDown");

  document.querySelector(".game-points").innerHTML = points;

  document.querySelector(".quit").addEventListener("click", function () {
    closeGameOver(0);
  });
  document.querySelector(".continue").addEventListener("click", function () {
    closeGameOver(1);
  });
}


function closeGameOver(option) {
  switch (option) {
    //quit
    case 0:
      document.getElementById("finalscore").value = points;
      document.getElementById("endgame").submit();
      break;

    //continue
    case 1:
      manageMenu(gameOver, 0, "animate__fadeInDown", "animate__fadeOutDown");
      //open main menu again
      setTimeout(function () {
        gameOver.style.visibility = "hidden";
        //open mainMenu
        mainMenu.style.display = "flex";
        manageMenu(mainMenu, 1, "animate__fadeInDown", "animate__fadeOutDown");
      }, 500);
      break;
  }
}


function openSettingsMenu() {
  settingsMenu.style.visibility = "visible";
  //open wrapper
  manageMenu(settingsMenu, 1, "animate__fadeInDown", "animate__fadeOutDown");

  settingsMenuBack.addEventListener("click", function () {
    closeSettingsMenu();
  });
}

function closeSettingsMenu() {
  manageMenu(settingsMenu, 0, "animate__fadeInDown", "animate__fadeOutDown");
  setTimeout(function () {
    settingsMenu.style.visibility = "hidden";
  }, 500);

}

function showFab() {
  //open fab
  manageMenu(fab, 1, "animate__slideInUp", "animate__fadeOutDown");
  fab.style.visibility = "visible";
}

function hideFab() {
  //close fab
  setTimeout(function () {
    manageMenu(fab, 0, "animate__slideInUp", "animate__fadeOutDown");
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
      objects[i].style.left = parseFloat(objects[i - 1].style.left) + (gameWidth * 1.05) / 5 + "px";
    }
  }

  console.log("Window resized to " + "(" + windowWidth + ", " + windowHeight + ")");
  console.log("Game resized to " + "(" + gameWidth + ", " + gameHeight + ")");
}

function setParameters(speed, speedIncrement, eventInterval, eventDuration, lives, points) {
  this.speed = speed;
  this.speedIncrement = speedIncrement;
  this.lives = lives;
  this.points = points;
  getSelectedEvents();
  displayLives.innerHTML = lives;
  displayPoints.innerHTML = points;
  if (eventInterval < 0 || eventDuration < 0) {
    this.eventInterval = 0;
    this.eventDuration = 0;
  } else {
    this.eventInterval = eventInterval;
    this.eventDuration = eventDuration;
  }
}

function animateInfo(info, color, animation) {
  info.style.color = color;
  setTimeout(function () {
    info.style.color = "black";
    info.classList.remove(animation);
  }, 1000);
  info.classList.add(animation);
}

//not working...
function preloadImages() {
  gameContainer.style.backgroundImage = "url(./assets/back-dark.png)";
  gameContainer.style.backgroundImage = "url(./assets/back.png)";
  // var img = new Image();
  // img.src = "url(../assets/back.png)";
  // img.src = "url(../assets/back-dark.png)";
  // img.src = "url(../assets/objects/bomb.png)";
  // img.src = "url(../assets/objects/dark/bomb.png)";
  // objectNames.forEach(imageName => {
  //   img.src = "url(../assets/objects/ " + imageName + ".png)";
  //   img.src = "url(../assets/objects/dark/ " + imageName + ".png)";
  // });
}
