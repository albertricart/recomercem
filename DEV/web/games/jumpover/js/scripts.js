document.addEventListener('DOMContentLoaded', () => {

    const dino = document.querySelector('.player');
    const grid = document.querySelector('.grid');
    const body = document.querySelector('body');
    const alert = document.getElementById('alert');
    const goback = document.getElementById('goback');
    var isPaused = true;

    //idioma
    const eng = document.getElementById('eng');
    const esp = document.getElementById('esp');
    const cat = document.getElementById('cat');
    let score2 = document.getElementById('score2');

    var lang = "esp";

    eng.onclick = function(){
      score2.innerHTML = "SCORE:";
      lang = "eng";
      eng.style.filter = "grayscale(100%)";
      esp.style.filter = "grayscale(0%)";
      cat.style.filter = "grayscale(0%)";
      document.getElementById('howtoplay').innerHTML = "CONTROLS";
      document.getElementById('explain').innerHTML = "Press space, or up arrow to jump the thiefs.";
      gameovertxt.innerHTML = 'Press to start';
    }
    
    esp.onclick = function(){
      score2.innerHTML = "PUNTOS:";
      lang = "esp";
      eng.style.filter = "grayscale(0%)";
      esp.style.filter = "grayscale(100%)";
      cat.style.filter = "grayscale(0%)";
      document.getElementById('howtoplay').innerHTML = "CONTROLES";
      document.getElementById('explain').innerHTML = "Pulsa la tecla espacio o flecha hacia arriba para saltar a los ladrones.";
      gameovertxt.innerHTML = 'Prem para empezar';
    }

    cat.onclick = function(){
      score2.innerHTML = "PUNTS:";
      lang = "cat";
      eng.style.filter = "grayscale(0%)";
      esp.style.filter = "grayscale(0%)";
      cat.style.filter = "grayscale(100%)";
      document.getElementById('howtoplay').innerHTML = "CONTROLS";
      document.getElementById('explain').innerHTML = "Prem espai o fletxa amunt per saltar els lladres";
      gameovertxt.innerHTML = 'Pulsa per començar';
    }

    //sonidos
    var jumpSound = new Audio('jump.wav');
    var goSound = new Audio('gameover.wav');
    var go = 0;

    //menu (position & border)
    var menu = document.createElement('div');
    menu.className = "menu";
    menu.id = "menu";
    document.getElementById('back').appendChild(menu);

    //menu back
    var menuback = document.createElement('div');
    menuback.className = "menuback";
    menuback.id = "menuback";
    document.getElementById('menu').appendChild(menuback);

    //GAME OVER text
    var gameovertxt = document.createElement('h1');
    gameovertxt.className = "gameovertxt";
    gameovertxt.id = "gameovertxt";
    document.getElementById('back').appendChild(gameovertxt);

    var playbtn = document.createElement('button');
    playbtn.className = "playbtn";
    playbtn.id = "playbtn";
    document.getElementById('back').appendChild(playbtn);

    if(lang === "esp"){
      score2.innerHTML = "PUNTOS:";
      document.getElementById('howtoplay').innerHTML = "CONTROLES"
      document.getElementById('explain').innerHTML = "Pulsa la tecla espacio o flecha hacia arriba para saltar a los ladrones."
      gameovertxt.innerHTML = 'Pulsa para empezar';
    } else if(lang === "eng"){
      score2.innerHTML = "SCORE:";
      document.getElementById('howtoplay').innerHTML = "CONTROLS"
      document.getElementById('explain').innerHTML = "Press space, or up arrow to jump the thiefs."
      gameovertxt.innerHTML = 'Press to start';
    } else if(lang === "cat"){
      score2.innerHTML = "PUNTS:";
      document.getElementById('howtoplay').innerHTML = "CONTROLS"
      document.getElementById('explain').innerHTML = "Prem espai o fletxa amunt per saltar als lladres"
      gameovertxt.innerHTML = 'Prem per començar';
    }
    var checkpause = setInterval(pause, 1000);
    

    playbtn.onclick = function(){
      isPaused = false;
      document.getElementById("playbtn").remove();
      document.getElementById("gameovertxt").remove();
      document.getElementById("menuback").remove();
      document.getElementById("menu").remove();
    }

    function pause(){
      if(!isPaused){
        clearInterval(checkpause);
        goplay();
      }
    }

    
function goplay(){
  var score = 0;
  let isJumping = false;
  let gravity = 0.9;
  let isGameOver = false;

  function control(e) {
    if (e.keyCode === 32 || e.keyCode === 38) {
      if (!isJumping) {
        isJumping = true;
        jump();
      }
    }
  }

  document.addEventListener('keydown', control);
  
  let position = 0;
  //salto
  function jump() {
    if(!isGameOver){
      jumpSound.play();
    }
    let count = 0;
    let timerId = setInterval(function () {

      //bajada
      if (count === 12) {
        clearInterval(timerId);
        let downTimerId = setInterval(function () {
          if (count === 0) {
            clearInterval(downTimerId);
            isJumping = false;
          }
          position -= 5;
          count--;
          position = position * gravity;
          dino.style.bottom = position + 'px';
        },20)
  
      }

      //subida
      position +=22;
      count++;
      position = position * gravity;
      dino.style.bottom = position + 'px';
    },20)
  }
  
  //generar obstaculos
  function generateObstacles() {
    //let obstaclePosition = 1480;
    let obstaclePosition = 1050;

    const obstacle = document.createElement('div');

    if (!isGameOver) {
      obstacle.classList.add('obstacle');
      grid.appendChild(obstacle);
      obstacle.style.left = obstaclePosition + 'px';
    }
  
    //movimiento obstaculos, collisions, Game Over
    let timerId = setInterval(function() {
      if (obstaclePosition > 0 && obstaclePosition < 60 && position < 60) {

        clearInterval(timerId);
        //alert.innerHTML = 'Game Over';
        isGameOver = true;

        if(go === 0){

          goSound.play();
          go++;
          menuGO();
        }
        
        //remove
        while (grid.firstChild) {
          grid.removeChild(grid.lastChild);
        }
        
        
      }

      if(score <= 200){
        obstaclePosition -=10;
        obstacle.style.left = obstaclePosition + 'px';

        if(obstaclePosition === -10){
          grid.removeChild(obstacle);
          
        }
        
      } else if (score <= 300){
        obstaclePosition -=15;
        obstacle.style.left = obstaclePosition + 'px';

        if(obstaclePosition === -30){
        grid.removeChild(obstacle);
        }

      } else if (score > 300){
        obstaclePosition -=20;
        obstacle.style.left = obstaclePosition + 'px';

        if(obstaclePosition === -30){
          grid.removeChild(obstacle);
        }
        
      }
      
    },20)

    if (!isGameOver) {

        //subida de puntuacion
        score += 10;
        if(lang === "esp"){
          document.getElementById('score').innerHTML = (score - 10);
        } else if(lang === "eng"){
          document.getElementById('score').innerHTML = (score - 10);
        } else if(lang === "cat"){
          document.getElementById('score').innerHTML = (score - 10);
        }
        
             
        //dificultad por puntuacion
             
        if(score <= 200){

            randomTime = (Math.random() * 2500) + 1500;
            setTimeout(generateObstacles, randomTime);

        } else if (score <= 400){

            randomTime = (Math.random() * 1200) + 800;
            setTimeout(generateObstacles, randomTime);

        } else if (score > 400){

            randomTime = (Math.random() * 800) + 200;
            setTimeout(generateObstacles, randomTime);

        }
        }
  }

  function menuGO(){
      if(isGameOver){

        //menu (position & border)
        var menu = document.createElement('div');
        menu.className = "menu";
        menu.id = "menu";
        document.getElementById('back').appendChild(menu);
        
        //menu back
        var menuback = document.createElement('div');
        menuback.className = "menuback";
        menuback.id = "menuback";
        document.getElementById('menu').appendChild(menuback);

        //GAME OVER text
        var gameovertxt = document.createElement('h1');
        gameovertxt.className = "gameovertxt";
        gameovertxt.id = "gameovertxt";
        document.getElementById('back').appendChild(gameovertxt);
        gameovertxt.innerHTML = 'Game Over';

        //score text
        var scoretxt = document.createElement('h3');
        scoretxt.className = "scoretxt";
        scoretxt.id = "scoretxt";
        document.getElementById('back').appendChild(scoretxt);
        
        if(lang === "esp"){

          scoretxt.innerHTML = 'Tu puntuación es de: "' + (score - 10) + '" puntos';

        } else if(lang === "eng"){
          scoretxt.style.left = "38%";
          scoretxt.innerHTML = 'Your score is: "' + (score - 10) + '" points';

        } else if(lang === "cat"){

          scoretxt.innerHTML = 'La puntuació es de: "' + (score - 10) + '" punts';

        }

        //reload
        var reload = document.createElement('button');
        reload.className = "reloadiv";
        reload.id = "reloadiv";
        document.getElementById('back').appendChild(reload);

        reload.onclick = function(){
          window.location.reload(true);
        }

        //salida a summary
        var summary = document.createElement('button');
        summary.className = "summarydiv";
        summary.id = "summarydiv";
        document.getElementById('back').appendChild(summary);

        summary.onclick = function(){
          document.getElementById('finalscore').value = score - 10;
          document.getElementById('endgame').submit();
        }
      }
  }

  generateObstacles();

}
    
})