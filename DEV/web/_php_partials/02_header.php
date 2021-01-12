
</head>

<body>

<header>

    <a href="/index.html"><img id="headLogo" src="/images/recomercem_logo.svg"></a>

    <svg id="iconMenu" x="0px" y="0px" width="52px" height="52px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" onclick="viewMenu()">
        <g><rect fill="currentColor" width="52" height="10"/><rect y="21" fill="currentColor" width="52" height="10"/><rect y="42" fill="currentColor" width="52" height="10"/></g>
    </svg>

    <svg id="iconUser" <?=((isset($_SESSION['user']))?'style="color: var(--colLogued)" ':'')?>x="0px" y="0px" width="52px" height="52px" viewBox="0 0 52.01 52.01" enable-background="new 0 0 52.01 52.01" onclick="viewUser()">
        <path fill="currentColor" d="M17,21c0,4.97,4.03,9,9.01,9c4.97,0,9-4.03,9-9c0-4.97-4.03-9-9-9
        C21.03,12,17,16.03,17,21z M26.01,3.27c12.55,0,22.73,10.18,22.73,22.73c0,7.08-3.23,13.41-8.3,17.58c0.37-0.95,0.57-1.99,0.57-3.07
        c0-4.7-3.81-8.5-8.5-8.5H19.5c-4.69,0-8.5,3.8-8.5,8.5c0,1.08,0.2,2.12,0.57,3.07C6.5,39.41,3.27,33.08,3.27,26
        C3.27,13.45,13.45,3.27,26.01,3.27z M26.01,0C11.64,0,0,11.64,0,26c0,14.37,11.64,26.01,26.01,26.01c14.36,0,26-11.64,26-26.01
        C52.01,11.64,40.37,0,26.01,0z"/></svg>

    <svg id="iconLanguage" x="0px" y="0px" width="52.01px" height="52.01px" viewBox="0 0 52.01 52.01" enable-background="new 0 0 52.01 52.01" onclick="viewLang()">
    <path fill="currentColor" d="M30.65,11.1c4.88,1.52,8.74,5.38,10.26,10.26c-1.84-1.24-4.39-2.24-7.39-2.87
        C32.89,15.49,31.89,12.94,30.65,11.1z M41.61,25.98V26c0,2.62-3.06,4.06-7.62,4.74c0.19-1.51,0.29-3.1,0.29-4.74
        c0-1.63-0.1-3.22-0.29-4.73C38.54,21.94,41.59,23.38,41.61,25.98z M40.91,30.65c-1.53,4.88-5.38,8.73-10.26,10.25
        c1.24-1.83,2.24-4.38,2.87-7.38C36.52,32.89,39.07,31.89,40.91,30.65z M21.36,40.9c-4.88-1.52-8.73-5.37-10.25-10.25
        c1.83,1.24,4.38,2.24,7.38,2.87C19.12,36.52,20.12,39.07,21.36,40.9z M10.4,26.02V26c0-2.61,3.06-4.06,7.62-4.73
        c-0.19,1.51-0.29,3.1-0.29,4.73c0,1.64,0.1,3.23,0.29,4.74C13.47,30.07,10.42,28.63,10.4,26.02z M11.11,21.36
        c1.52-4.88,5.37-8.74,10.25-10.26c-1.24,1.84-2.24,4.39-2.87,7.39C15.49,19.12,12.94,20.12,11.11,21.36z M26.01,8
        C16.07,8,8.02,16.04,8,25.97V26c0,9.95,8.06,18.01,18.01,18.01c9.93,0,17.99-8.05,18-17.98V26C44.01,16.06,35.95,8,26.01,8z
            M26.01,10.4c2.61,0,4.06,3.06,4.73,7.62c-1.51-0.19-3.1-0.29-4.73-0.29c-1.64,0-3.23,0.1-4.74,0.29
        C21.95,13.46,23.39,10.4,26.01,10.4z M31.06,20.95c0.12,1.59,0.17,3.29,0.17,5.05c0,1.77-0.05,3.47-0.17,5.05
        c-1.59,0.12-3.29,0.18-5.05,0.18c-1.77,0-3.47-0.06-5.05-0.18c-0.12-1.58-0.18-3.28-0.18-5.05c0-1.76,0.06-3.46,0.18-5.05
        c1.58-0.12,3.28-0.17,5.05-0.17C27.77,20.78,29.47,20.83,31.06,20.95z M30.74,33.99c-0.67,4.56-2.12,7.62-4.73,7.62
        c-2.62,0-4.06-3.06-4.74-7.62c1.51,0.19,3.1,0.29,4.74,0.29C27.64,34.28,29.23,34.18,30.74,33.99z M26.01,2.93
        c12.74,0,23.07,10.33,23.07,23.07c0,12.75-10.33,23.08-23.07,23.08c-4.44,0-8.58-1.26-12.1-3.43L13,45.93v-0.92l-10,4l3-11H5.54
        l0.22-0.94C3.96,33.79,2.93,30.01,2.93,26C2.93,13.26,13.26,2.93,26.01,2.93z M12.43,48.19c3.95,2.42,8.6,3.82,13.58,3.82
        c14.36,0,26-11.64,26-26.01c0-14.36-11.64-26-26-26C11.64,0,0,11.64,0,26c0,4.37,1.08,8.49,2.98,12.1L0,52.01L12.43,48.19z"/>
    </svg>

    <ul id="menuUser" class="menuHidden" data-close="menuHidden" data-open="menuVisible">
        <?php 

        if(isset($_SESSION['user'])) { ?>

        <p id="hiUserText">Hola, <?=$_SESSION['user']['name']?></p>
        <form action="/index.html?logout" method="POST"><button type="submit" id="cerrarBtnX" name="cerrarSesionBtn">Cerrar Sesión</button></form>

        <?php } else { ?>

        <form id="loginForm" name="loginForm" action="./_php_controllers/loginController.php" method="POST" class="login-form">
            <label for="email"><?=$emailText?></label>
            <input type="email" id="email" name="email" placeholder="<?=$emailPlaceholder?>" required></input>

            <label for="password"><?=$passwordText?></label>
            <div style="position: relative;">
                <input type="password" id="password" name="password" placeholder="<?=$passwordPlaceholder?>" required></input>
                <div class="showpw"></div>
            </div>
            <?=((isset($errorMessage))?'<span class="error-message">'.$errorMessage.'</span>':'')?>
            <button type="submit" class="login-btn" name="submitBtnLogin"><?=$loginText?></button>
        </form>

        <a href="signup.php" class="signup"><?=$newAccountText?></a>

        <? } ?>
    </ul>

    <ul id="langSelec" class="menuHidden" data-close="menuHidden" data-open="menuVisible">
        <li class="menuItem"><a id="langEsp" href="<?=explode( '.', $_SERVER['PHP_SELF'] )[0].".html?lx=esp"?>" target="_self" class="menuLink">Español</a></li>
        <li class="menuItem"><a id="langCat" href="<?=explode( '.', $_SERVER['PHP_SELF'] )[0].".html?lx=cat"?>" target="_self" class="menuLink">Català</a></li>
        <li class="menuItem"><a id="langEng" href="<?=explode( '.', $_SERVER['PHP_SELF'] )[0].".html?lx=eng"?>" target="_self" class="menuLink">English</a></li>
    </ul>

    <ul id="menuBox" class="menuHidden" data-close="menuHidden" data-open="menuVisible">
        <li class="menuItem"><a id="menuHome" href="/index.html" target="_self" class="menuLink">Home</a></li>
        <li class="menuItem"><a id="menuStores" href="/search_stores.html" target="_self" class="menuLink">Search Stores</a></li>
        <li class="menuItem"><a id="menuGames" href="/summary.html" target="_self" class="menuLink">Game Discounts</a></li>
        <li class="menuItem"><a id="menuOffers" href="/last_offers.html" target="_self" class="menuLink">Last Offers</a></li>
        <li class="menuItem"><a id="menuProject" href="/projecte.html" target="_self" class="menuLink">The Project</a></li>
        <li class="menuItem"><a id="menuAboutus" href="/about_us.html" target="_self" class="menuLink">About Us</a></li>
        <li class="menuItem"><a id="menuPrivacy" href="/privacy_and_cookies.html" target="_self" class="menuLink"> Privacy</a></li>
    </ul>
    
</header>

<main>
