<?php
session_start();
//obtenemos las funciones necesarias para conectarnos a la base de datos
include_once("../mybackend/_php_librarys/_db.php");

if (isset($_POST['submitBtnLogin'])) {
    //variable para el mensaje de error
    $_SESSION['error'] = "";

    try {
        $dbh = openDB();
        $sql = "select * from usuario where email = :email";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":email", $_POST['email']);
        $sth->execute();
        $result = $sth->fetchAll();
        if (count($result) == 0) {
            $_SESSION['error'] = "No existe una cuenta asociada al correo introducido";
        } else {
            
            // if ((crypt($_POST['password'], "magomo") != $result[0]['password'])) {
            //     $_SESSION['error'] = "Contraseña incorrecta";
            // }

            if (!password_verify($_POST['password'], $result[0]['password'])) {
                $_SESSION['error'] = "Contraseña incorrecta";   
            }
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = handlePDOErrorMessage($e);
    }

    $dbh = closeDB();
}

if ($_SESSION['error'] == "") {
    header("Location: ../index.php");
    exit();
} else {
    $_SESSION['email'] = $_POST['email'];
    header("Location: ../login.php");
    exit();
}
