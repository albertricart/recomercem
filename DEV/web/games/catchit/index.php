<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
    <link rel="shortcut icon" href="assets/catch-image.png" />
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body>

    <div style="z-index: 10000; background-color: white; height: 7vh;">
        <?
        // - - - - - - - - - - - - - - - - - - - - Logo & Menu Part =>
        if ( file_exists( "../../_php_partials/00_game_header.php" ) ) { include_once("../../_php_partials/00_game_header.php"); }
        // - - - - - - - - - - - - - - - - - - - - Logo & Menu Part //
        ?>
    </div>

    <div class="catch-it">
        <div class="menu-wrapper animate__animated">
            <div class="main-menu animate__animated">
                <h1 style="flex: 1;">CATCH IT</h1>
                <div class="main-menu-opts">
                    <div class="main-menu-game-start opt">PLAY</div>
                    <div class="main-menu-game-settings opt">SETTINGS</div>
                </div>
            </div>

            <div class="game-over animate__animated">
                <h2 class="final-score-label">Final Score</h2>
                <p class="final-score-points"> <span class="game-points" style="font-size: 24px;"></span></p>
                <div class="game-over-opts">
                    <div class="quit opt">
                        QUIT
                        <form id="endgame" action="/summary.html" method="POST">
                            <input id="gameid" name="gameid" type="hidden" value="2" />
                            <input id="finalscore" name="finalscore" type="hidden" value="" />
                        </form>

                    </div>
                    <div class="continue opt">NEW GAME</div>
                </div>
            </div>


            <div class="menu animate__animated">
                <div class="menu-nav">
                    <div class='menu-nav__opt js-menu-opt' data-tab='#tabParam'>
                        <div class="menu-nav__icon menu-nav__icon--params"></div>
                        <div class="parameters_opt_text">Parameters</div>
                    </div>
                    <div class='menu-nav__opt js-menu-opt' data-tab='#tabLang'>
                        <div class="menu-nav__icon menu-nav__icon--lang"></div>
                        <div class="language_opt_text">Language</div>
                    </div>
                    <div class='menu-nav__opt js-menu-opt' data-tab='#tabTuto'>
                        <div class="menu-nav__icon menu-nav__icon--tut"></div>
                        <div class="tutorial_opt_text">Tutorial</div>
                    </div>
                    <div class='menu-nav__opt js-menu-opt' data-tab='#tabCtrl'>
                        <div class="menu-nav__icon menu-nav__icon--controls"></div>
                        <div class="controls_opt_text">Controls</div>
                    </div>
                </div>
                <div class="menu-body">
                    <div class="menu-body-parameters menu__tab animate__animated" id='tabParam'>
                        <div class="menu-body-parameters__diff">
                            <label for="difficulty" class="difficulty-label">Difficulty</label>
                            <select name="difficulty" id="difficulty">
                                <option value="Easy" class="easy-opt">Easy</option>
                                <option value="Normal" selected class="normal-opt">Normal</option>
                                <option value="Hard" class="hard-opt">Hard</option>
                                <option value="Custom" class="custom-opt">Custom</option>
                            </select>
                        </div>

                        <div class="menu-body-parameters__lives">
                            <label for="speed" class="lives-label">Lives</label>
                            <input type="range" id="chooseLives" name="chooseLives" min="1" max="5" value="5" class="slider">
                            <span class="chooseLives-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="menu-body-parameters__slideSpeed">
                            <label for="speed" class="initialSpeed-label">Initial speed</label>
                            <input type="range" id="speed" name="speed" min="1" max="3" value="2" class="slider">
                            <span class="slideSpeed-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="menu-body-parameters__slideSpeedIncrement">
                            <label for="speedIncrement" class="speedIncrement-label">Speed increment</label>
                            <input type="range" id="speedIncrement" name="speedIncrement" min="1" max="3" value="2" class="slider">
                            <span class="speedIncrement-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="menu-body-parameters__eventInterval">
                            <label for="eventInterval" class="eventInterval-label">Event interval</label>
                            <input type="number" id="eventInterval" placeholder="..." min="0" max="60" value="30" />
                            <span>s</span>
                        </div>

                        <div class="menu-body-parameters__eventDuration">
                            <label for="eventDuration" class="eventDuration-label">Event duration</label>
                            <input type="number" id="eventDuration" placeholder="..." min="0" max="30" value="10" />
                            <span>s</span>
                        </div>

                        <div class="menu-body-parameters__eventsAvailable"></div>
                        <span class="chooseEventDesc">Choose the available events for your next play:</span>

                        <div>
                            <input type="checkbox" id="lightsOut" name="chooseEvents" class="eventCheckbox" data-eventid="1">
                            <label for="lightsOut" class="lightsOut-label">Lights out</label>
                        </div>

                        <div>
                            <input type="checkbox" id="pointsX2" name="chooseEvents" class="eventCheckbox" data-eventid="2">
                            <label for="pointsX2" class="doublePoints-label">Double points</label>
                        </div>

                        <div>
                            <input type="checkbox" id="lockY" name="chooseEvents" class="eventCheckbox" data-eventid="3">
                            <label for="lockY" class="lockY-label">Lock Y axis</label>
                        </div>

                        <div>
                            <input type="checkbox" id="invertAxis" name="chooseEvents" class="eventCheckbox" data-eventid="4">
                            <label for="invertAxis" class="invertAxis-label">Invert axis</label>
                        </div>

                    </div>
                    <div class="menu-body-controls menu__tab animate__animated" id='tabCtrl'>
                        <div class="controls-help">
                            <p class="controlsDesc">Click on the control corresponding button and press the new key.</p>
                        </div>
                        <div class="menu-body-controls">
                            <button type="button" id="up" class="control-binding"></button>
                            <span class="up-label">Up</span>
                        </div>
                        <div class="menu-body-controls">
                            <button type="button" id="left" class="control-binding"></button>
                            <span class="left-label">Left</span>
                        </div>
                        <div class="menu-body-controls">
                            <button type="button" id="down" class="control-binding"></button>
                            <span class="down-label">Down</span>
                        </div>
                        <div class="menu-body-controls">
                            <button type="button" id="right" class="control-binding"></button>
                            <span class="right-label">Right</span>
                        </div>
                    </div>
                    <div class="menu-body-tutorial-slides menu__tab animate__animated" id='tabTuto'>

                    </div>
                    <div class="menu-body-language-selection menu__tab animate__animated" id='tabLang'>
                        <p class="languageDesc">Select the language to be displayed in:</p>

                        <div>
                            <input type="radio" id="radioCa" name="lang" value="catala">
                            <label for="catala">Català</label>
                        </div>

                        <div>
                            <input type="radio" id="radioEs" name="lang" value="spanish">
                            <label for="spanish">Español</label>
                        </div>

                        <div>
                            <input type="radio" id="radioEn" name="lang" value="english">
                            <label for="english">English</label>
                        </div>

                    </div>


                </div>
                <div class="menu-back">
                    <div class="menu-back-text">BACK</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="game-container">

                <div class="game-container__object" data-objectType="O"></div>

                <div class="game-container__object" data-objectType="O"></div>

                <div class="game-container__object" data-objectType="O"></div>

                <div class="game-container__object" data-objectType="O"></div>

                <div class="game-container__object" data-objectType="O"></div>

                <div class="game-container__basket"></div>
            </div>

            <div class="game-info">
                <div class="game-info__timer">
                    <p class="game-time">Time</p>
                    <p id="timeElapsed">0.00s</p>
                </div>
                <div class="game-info__points">
                    <p class="game-points">Points</p>
                    <p id="points" class="animate__animated">0</p>
                </div>
                <div class="game-info__lives">
                    <p class="game-lives">Lives</p>
                    <p id="lives" class="animate__animated">0</p>
                </div>
                <div class="game-info__event">
                    <span class="game-event" style="flex: 1;">Event</span>
                    <div class="game-info__event-desc" style="text-align: center;">
                        <div class="displayInfoCurrentEvent">
                            <div class="game-info__event__icon animate__animated">
                            </div>
                            <span class="currentEventName" style="vertical-align: middle;"></span>
                        </div>

                        <span id="eventTime"> <span class="eventTimeText"> </span></span>
                    </div>
                </div>
            </div>

            <div class="game-parameters">
                <div class="fab-container animate__animated">
                    <div class="fab fab-icon-holder">
                        <i class="fas fa-question"></i>
                    </div>
                    <ul class="fab-options">
                        <a href="https://github.com/albertricart" target="_blank">
                            <li>
                                <span class="fab-label">GitHub</span>
                                <div class="fab-icon-holder" id="github">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </li>
                        </a>
                        <a href="https://github.com/albertricart/recomercem" target="_blank">
                            <li>
                                <span class="fab-label fab-code">Code</span>
                                <div class="fab-icon-holder" id="code">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </li>
                        </a>
                        <li>
                            <span class="fab-label fab-settings">Settings</span>
                            <div class="fab-icon-holder" id="settings">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



    </div>




</body>
<script src="js/app.js"></script>
<script src="js/menu.js"></script>

</html>