<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>JumpOver v0.5</title>
  <link rel="stylesheet" href="styles/style.css"></link>
  <script src="js/scripts.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link rel="icon" type="image/png" href="src/logo.png"/>
</head>
<body>
<div id="cab">
</div>
<?
	
	if ( file_exists( "../../_php_partials/00_game_header.php" ) ) { 
    include_once("../../_php_partials/00_game_header.php"); 
  }
	
  ?>
  <div id="lang">
    <button id="esp" ></button>
    <button id="eng"></button>
    <button id="cat"></button>
  </div>
  <div id="logo"></div>
  <a  href="../../index.php">
    <svg id="goback"></svg>
  </a>
  <div id = grid>
    <div>
      <p id="score2"></p>
    </div>
    <div>
      <p id="score"></p>
    </div>
    <div id="back">
      <div class="grid">
        <div class="player"></div>
      </div>
    </div>
  </div>
  <div id="gridtxt">
    <h2 id="howtoplay"></h2>
    <p id="explain"></p>
  </div>

<form id="endgame" action="/summary.html" method="POST">
    <input id="gameid" name="gameid" type="hidden" value="2" />
    <input id="finalscore" name="finalscore" type="hidden" value="" />
</form>

</body>
</html>