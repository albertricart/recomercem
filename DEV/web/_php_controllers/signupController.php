<?php

session_start();

//obtenemos las funciones necesarias para conectarnos a la base de datos
include_once("../mybackend/_php_librarys/_db.php");

if (isset($_POST['submitBtnSignup'])) {

    //obtenemos los inputs del usuario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    //variable para el mensaje de error
    $_SESSION['error'] = "";

    //hacemos las comprobaciones previas antes de conectarnos a la base de datos
    if ($_POST['password'] == $_POST['password-repeat']) {
        //guardamos el hash de la contraseña del usuario
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $new_user = [
            "nombre" => $nombre,
            "email" => $email,
            "password" => $hashed_password
        ];
        $_SESSION['error'] = saveEntity("usuario", $new_user);

    } else {
        $_SESSION['error'] = "Las contraseñas no coinciden";
    }

    if ($_SESSION['error'] == "") {
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        header("Location: ../signup.php");
        exit();
    }
}
