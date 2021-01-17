<?php
session_start();

$pageStylesAry = array('login' => '/css/login.css');

// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");


//si hemos introducido el correo anteriormente se mostrará automaticamente
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
} else {
    $email = "";
}

//si ha habido un error se mostrará por pantalla
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $errorMessage = "";
}


?>

<div class="container">
    <div class="login-image">
        <?php include_once("./_php_partials/00_cerrar_sesion.php");?>
        <div class="login-form-wrapper">
            <h1 class="login-text"><?=$loginText?></h1>

            <form action="./_php_controllers/loginController.php" method="POST" class="login-form">
                <label for="email"><?=$emailText?></label>
                <input type="email" id="email" name="email" placeholder="<?=$emailPlaceholder?>" value="<?= $email ?>" required></input>

                <label for="password"><?=$passwordText?></label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="<?=$passwordPlaceholder?>" required></input>
                    <div class="showpw"></div>
                </div>
                <span class="error-message"><?= $errorMessage ?></span>

                <button type="submit" class="login-btn" name="submitBtnLogin"><?=$loginText?></button>
            </form>

            <a href="signup.php" class="signup"><?=$newAccountText?></a>

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/login.js"></script>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>