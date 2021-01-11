<?php
session_start();
//obtenemos las funciones necesarias para conectarnos a la base de datos
include_once("../mybackend/_php_librarys/_db.php");

if (isset($_POST['submitBtnLogin'])) {
    //variable para el mensaje de error
    $_SESSION['error'] = "";

    //obtenemos los inputs del usuario
    $email = $_POST['email'];
    $u_password = $_POST['password'];

    //hacemos las comprobaciones previas antes de conectarnos a la base de datos
    if (!empty($email) && !empty($u_password)) {
        try {
            $dbh = openDB();
            $sql = "select * from usuario where email = :email";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":email", $email);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);

            if (empty($result)) {
                $_SESSION['error'] = "No existe una cuenta asociada al correo introducido";
            } else {
                if (!password_verify($_POST['password'], $result['password'])) {
                    $_SESSION['error'] = "Contraseña incorrecta";
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = handlePDOErrorMessage($e);
        }

        $dbh = closeDB();
    } else {
        $_SESSION['error'] = "Debes rellenar todos los campos";
    }

    //en funcion de ha habido error o no iremos a la home o no
    if (empty($_SESSION['error'])) {
        $_SESSION['user']['name'] = $result['nombre'];
        $_SESSION['user']['email'] = $result['email'];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['email'] = $_POST['email'];
        header("Location: ../login.php");
        exit();
    }
}
