<?php
//abrimos sesion para poder trabajar con las variables de sesion
session_start();

$pageStylesAry = array('signup' => '/css/signup.css');

// - - - - - Traslate Settings
include_once("_php_partials/00_traslate_settings.php");

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");



//si hemos introducido el correo y nombre anteriormente se mostrará automaticamente
if (isset($_SESSION['email']) && isset($_SESSION['nombre'])) {
    $user = [
        "nombre" => $_SESSION['nombre'],
        "email" => $_SESSION['email']
    ];
    unset($_SESSION['nombre']);
    unset($_SESSION['email']);
} else {
    $user = [
        "nombre" => "",
        "email" => ""
    ];
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
    <div class="signup-image">
        <?php include_once("./_php_partials/00_cerrar_sesion.php");?>
        <div class="signup-form-wrapper">
            <h1 class="signup-text"><?=$signupText?></h1>

            <form action="./_php_controllers/signupController.php" method="POST" class="signup-form">
                <label for="nombre"><?=$nameText?></label>
                <input type="text" id="nombre" name="nombre" placeholder="<?=$namePlaceholder?>" value="<?= $user['nombre'] ?>" required></input>

                <label for="email"><?=$emailText?></label>
                <input type="email" id="email" name="email" placeholder="<?=$emailPlaceholder?>" value="<?= $user['email'] ?>" required></input>

                <label for="password"><?=$passwordText?></label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="<?=$passwordPlaceholder?>" required></input>
                    <div class="showpw"></div>
                </div>


                <label for="password-repeat"><?=$passwordRepeatText?></label>
                <input type="password" id="password-repeat" name="password-repeat" placeholder="<?=$passwordRepeatPlaceholder?>" required></input>
                <span class="error-message"><?= $errorMessage ?></span>

                <button type="submit" class="signup-btn" name="submitBtnSignup"><?=$signupText?></button>
            </form>

            <a href="login.php" class="login"><?=$accountText?></a>

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/signup.js"></script>

<?

// - - - - - - - - - - - - - - - - - - - - FOOTER PART
include_once("_php_partials/99_footer.php");

?>