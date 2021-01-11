<?php

session_start();

//obtenemos las funciones necesarias para conectarnos a la base de datos
include_once("../mybackend/_php_librarys/_db.php");

if (isset($_POST['submitBtnSignup'])) {

    //obtenemos los inputs del usuario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $u_password = $_POST['password'];
    $u_passwordRepeat = $_POST['password-repeat'];
    //variable para el mensaje de error
    $_SESSION['error'] = "";

    //hacemos las comprobaciones previas antes de conectarnos a la base de datos
    if (!empty($nombre) && !empty($email) && !empty($u_password) && !empty($u_passwordRepeat)) {
        if ($_POST['password'] == $_POST['password-repeat']) {

            //creamos el array asociativo new_user que sera procesado en saveEntity
            $new_user = [
                "cid" => 'US'. dechex ( time() ),
                "active" => true,
                "nombre" => $nombre,
                "email" => $email,
                "password" => $_POST['password']
            ];
            $_SESSION['error'] = saveEntity("usuario", $new_user);
        } else {
            $_SESSION['error'] = "Las contraseñas no coinciden";
        }
    } else {
        $_SESSION['error'] = "Debes rellenar todos los campos";
    }

    //en funcion de ha habido error o no iremos a la home o no
    if (empty($_SESSION['error'])) {
        $_SESSION['user']['cid'] = $cid;
        $_SESSION['user']['name'] = $nombre;
        $_SESSION['user']['email'] = $email;
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        header("Location: ../signup.php");
        exit();
    }
}
