<?php
session_start();

$pageStylesAry = array('login' => '/css/login.css');

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

<?php
include_once("./mybackend/_php_librarys/_db.php");
print_r(getEntity("usuario",  0, 0));
?>

<div class="container">
    <div class="login-image">
        <div class="login-form-wrapper">
            <h1 class="login-text">Log In</h1>

            <form action="./_php_controllers/loginController.php" method="POST" class="login-form">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Introduce tu correo..." value="<?= $email ?>" required></input>

                <label for="password">Contraseña</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Introduce tu contraseña..." required></input>
                    <div class="showpw"></div>
                </div>
                <span class="error-message"><?= $errorMessage ?></span>

                <button type="submit" class="login-btn" name="submitBtnLogin">Log In</button>
            </form>

            <a href="signup.php" class="signup">Crear una nueva cuenta</a>

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/login.js"></script>