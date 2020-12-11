document.addEventListener('DOMContentLoaded', () => {

    const dino = document.querySelector('.player');
    const grid = document.querySelector('.grid');
    const body = document.querySelector('body');
    const alert = document.getElementById('alert');

    //let randomTime = Math.random() * 4000;
    var jumpSound = new Audio('jump.wav');
    var goSound = new Audio('gameover.wav');
    var go = 0;


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
    document.addEventListener('keyup', control);
    
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
      let obstaclePosition = 1480;
      
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

          if(obstaclePosition === -20){
          grid.removeChild(obstacle);
          }

        } else if (score > 300){
          obstaclePosition -=20;
          obstacle.style.left = obstaclePosition + 'px';

          if(obstaclePosition === -20){
            grid.removeChild(obstacle);
          }
          
        }
        
      },20)

      if (!isGameOver) {

          //subida de puntuacion
          score += 10;
          document.getElementById('score').innerHTML = "SCORE: " + (score - 10);
               
          //dificultad por puntuacion
               
          if(score <= 210){

              randomTime = (Math.random() * 2500) + 1500;
              setTimeout(generateObstacles, randomTime);

          } else if (score <= 410){

              randomTime = (Math.random() * 1500) + 1000;
              setTimeout(generateObstacles, randomTime);

          } else if (score > 410){

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
          
        }
    }

    generateObstacles();
    })