<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catch It | reComercem: El teu comerç de proximitat al barri</title>
    <link rel="shortcut icon" href="assets/catch-image.png" />
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body>

    <div class="catch-it-nav">
        <?php
        // - - - - - - - - - - - - - - - - - - - - Logo & Menu Part =>
        if ( file_exists( "../../_php_partials/00_game_header.php" ) ) { include_once("../../_php_partials/00_game_header.php"); }
        // - - - - - - - - - - - - - - - - - - - - Logo & Menu Part //
        ?>

        <script> </script>
    </div>

    <div class="catch-it-app">
        <div class="menu-wrapper animate__animated">
            <div class="main-menu animate__animated">
                <h1>CATCH IT</h1>
                <div class="game-desc">
                    <div style="background-image: url('./assets/info.svg'); margin-right: 10px; width:100px; height:50px; background-size: contain; background-repeat: no-repeat;"></div>
                    <p class="lang" key="game-desc" style="margin: 0;"></p>
                </div>
                
                <div class="main-menu-opts">
                    <div class="main-menu-game-start opt lang" key="play">PLAY</div>
                    <div class="main-menu-game-settings opt lang" key="settings">SETTINGS</div>
                </div>
            </div>

            <div class="game-over animate__animated">
                <h2 class="final-score-label lang" key="finalScore" style="flex: 1;">Final Score</h2>
                <p class="final-score-points" style="flex: 1;"> <span class="game-points" style="font-size: 24px;"></span></p>
                <div class="game-over-opts">
                    <div class="quit opt lang" key="quit">
                        QUIT
                    </div>
                    <div class="continue opt lang" key="startGame">NEW GAME</div>
                </div>
            </div>

            <div class="settings-menu animate__animated">
                <div class="settings-menu-nav">
                    <div class='settings-menu-nav__opt js-menu-opt' data-tab='#tabParam'>
                        <div class="settings-menu-nav__icon settings-menu-nav__icon--params"></div>
                        <div class="parameters_opt_text lang" key="parameters">Parameters</div>
                    </div>
                    <div class='settings-menu-nav__opt js-menu-opt' data-tab='#tabLang'>
                        <div class="settings-menu-nav__icon settings-menu-nav__icon--lang"></div>
                        <div class="language_opt_text lang" key="language">Language</div>
                    </div>
                    <div class='settings-menu-nav__opt js-menu-opt' data-tab='#tabCtrl'>
                        <div class="settings-menu-nav__icon settings-menu-nav__icon--controls"></div>
                        <div class="controls_opt_text lang" key="controls">Controls</div>
                    </div>
                </div>
                <div class="settings-menu-body">
                    <div class="settings-menu-body-parameters settings-menu__tab animate__animated" id='tabParam'>
                        <div class="settings-menu-body-parameters__diff">
                            <label for="difficulty" class="difficulty-label lang" key="difficulty">Difficulty</label>
                            <select name="difficulty" id="difficulty">
                                <option value="Easy" class="easy-opt lang" key="easy">Easy</option>
                                <option value="Normal" selected class="normal-opt lang" key="normal">Normal</option>
                                <option value="Hard" class="hard-opt lang" key="hard">Hard</option>
                                <option value="Custom" class="custom-opt lang" key="custom">Custom</option>
                            </select>
                        </div>

                        <div class="settings-menu-body-parameters__lives">
                            <label for="speed" class="lives-label lang" key="lives">Lives</label>
                            <input type="range" id="chooseLives" name="chooseLives" min="1" max="5" value="5" class="slider">
                            <span class="chooseLives-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="settings-menu-body-parameters__slideSpeed">
                            <label for="speed" class="initialSpeed-label lang" key="initialSpeed">Initial speed</label>
                            <input type="range" id="speed" name="speed" min="1" max="3" value="2" class="slider">
                            <span class="slideSpeed-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="settings-menu-body-parameters__slideSpeedIncrement">
                            <label for="speedIncrement" class="speedIncrement-label lang" key="speedIncrement">Speed increment</label>
                            <input type="range" id="speedIncrement" name="speedIncrement" min="1" max="3" value="2" class="slider">
                            <span class="speedIncrement-value" style="font-weight: bold;"></span>
                        </div>

                        <div class="settings-menu-body-parameters__eventInterval">
                            <label for="eventInterval" class="eventInterval-label lang" key="eventInterval">Event interval</label>
                            <input type="number" id="eventInterval" placeholder="..." min="0" max="60" value="30" />
                            <span>s</span>
                        </div>

                        <div class="settings-menu-body-parameters__eventDuration">
                            <label for="eventDuration" class="eventDuration-label lang" key="eventDuration">Event duration</label>
                            <input type="number" id="eventDuration" placeholder="..." min="0" max="30" value="10" />
                            <span>s</span>
                        </div>

                        <div class="settings-menu-body-parameters__eventsAvailable">
                            <span class="chooseEventDesc lang" key="chooseEvents">Choose the available events for your next play:</span>

                            <div>
                                <input type="checkbox" id="lightsOut" name="chooseEvents" class="eventCheckbox" data-eventid="1">
                                <label for="lightsOut" class="lightsOut-label lang" key="lightsOut">Lights out</label>
                            </div>

                            <div>
                                <input type="checkbox" id="pointsX2" name="chooseEvents" class="eventCheckbox" data-eventid="2">
                                <label for="pointsX2" class="doublePoints-label lang" key="doublePoints">Double points</label>
                            </div>

                            <div>
                                <input type="checkbox" id="lockY" name="chooseEvents" class="eventCheckbox" data-eventid="3">
                                <label for="lockY" class="lockY-label lang" key="lockY">Lock Y axis</label>
                            </div>

                            <div>
                                <input type="checkbox" id="invertAxis" name="chooseEvents" class="eventCheckbox" data-eventid="4">
                                <label for="invertAxis" class="invertAxis-label lang" key="invertAxis">Invert axis</label>
                            </div>

                            <div>
                                <input type="checkbox" id="dodge" name="chooseEvents" class="eventCheckbox" data-eventid="5">
                                <label for="dodge" class="dodge-label lang" key="dodge">Dodge</label>
                            </div>
                        </div>

                    </div>
                    <div class="settings-menu-body-controls settings-menu__tab animate__animated" id='tabCtrl'>
                        <div class="controls-help">
                            <p class="controlsDesc lang" key="controlsDesc">Click on the control corresponding button and press the new key.</p>
                        </div>
                        <div class="settings-menu-body-controls">
                            <button type="button" id="up" class="control-binding"></button>
                            <span class="up-label lang" key="up">Up</span>
                        </div>
                        <div class="settings-menu-body-controls">
                            <button type="button" id="left" class="control-binding"></button>
                            <span class="left-label lang" key="left">Left</span>
                        </div>
                        <div class="settings-menu-body-controls">
                            <button type="button" id="down" class="control-binding"></button>
                            <span class="down-label lang" key="down">Down</span>
                        </div>
                        <div class="settings-menu-body-controls">
                            <button type="button" id="right" class="control-binding"></button>
                            <span class="right-label lang" key="right">Right</span>
                        </div>
                    </div>
                    <div class="settings-menu-body-language-selection settings-menu__tab animate__animated" id='tabLang'>
                        <p class="languageDesc lang" key="languageDesc">Select the language to be displayed in:</p>

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
                <div class="settings-menu-back">
                    <div class="settings-menu-back-text lang" key="back">BACK</div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="game-container">

                <div class="game-container__object" data-objecttype="O" data-objectimg=""></div>

                <div class="game-container__object" data-objecttype="O" data-objectimg=""></div>

                <div class="game-container__object" data-objecttype="O" data-objectimg=""></div>

                <div class="game-container__object" data-objecttype="O" data-objectimg=""></div>

                <div class="game-container__object" data-objecttype="O" data-objectimg=""></div>

                <div class="game-container__basket"></div>
            </div>

            <div class="game-info">
                <div class="game-info__timer">
                    <p class="game-time lang" key="time">Time</p>
                    <p id="timeElapsed">0.00s</p>
                </div>
                <div class="game-info__points">
                    <p class="game-points lang" key="points">Points</p>
                    <p id="points" class="animate__animated">0</p>
                </div>
                <div class="game-info__lives">
                    <p class="game-lives lang" key="lives">Lives</p>
                    <p id="lives" class="animate__animated">0</p>
                </div>
                <div class="game-info__event">
                    <span class="game-event lang" key="event">Event</span>
                    <div class="game-info__event-desc">
                        <p id="eventTime" style="margin:0;"> <span class="eventTimeText"> </span></p> 
                        <div class="displayInfoCurrentEvent">
                            <div class="game-info__event__icon animate__animated">
                            </div>
                            <span class="currentEventName" style="margin-top: 12px; margin-left: 5px;"></span>
                        </div>
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
                                <span class="fab-label fab-code lang" key="code">Code</span>
                                <div class="fab-icon-holder" id="code">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </li>
                        </a>
                        <li>
                            <span class="fab-label fab-settings lang" key="settings">Settings</span>
                            <div class="fab-icon-holder" id="settings">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form id="endgame" action="/summary.html" method="POST">
        <input id="gameid" name="gameid" type="hidden" value="3" />
        <input id="finalscore" name="finalscore" type="hidden" value="" />
    </form>
</body>
<script src="js/app.js"></script>
<script src="js/menu.js"></script>

</html>