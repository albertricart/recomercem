<?php
session_start();

$pageStylesAry = array('signup' => '/css/signup.css');

// - - - - - - - - - - - - - - - - - - - - HEAD PART
include_once("_php_partials/01_head.php");

// - - - - - - - - - - - - - - - - - - - - HEADER PART
include_once("_php_partials/02_header.php");

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

if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $errorMessage = "";
}
?>

<div class="container">
    <div class="signup-image">
        <div class="signup-form-wrapper">
            <h1 class="signup-text">Sign Up</h1>

            <form action="./_php_controllers/signupController.php" method="POST" class="signup-form">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre..." value="<?= $user['nombre'] ?>" required></input>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Introduce tu correo..." value="<?= $user['email'] ?>" required></input>

                <label for="password">Contraseña</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Introduce tu contraseña..." required></input>
                    <div class="showpw"></div>
                </div>


                <label for="password-repeat">Repetir Contraseña</label>
                <input type="password" id="password-repeat" name="password-repeat" placeholder="Repite tu contraseña..." required></input>
                <span class="error-message"><?= $errorMessage ?></span>

                <button type="submit" class="signup-btn" name="submitBtnSignup">Sign Up</button>
            </form>

            <a href="login.php" class="login">Ya tengo una cuenta</a>

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/signup.js"></script>