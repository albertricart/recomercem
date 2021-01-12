<?php
//abrimos sesion para poder trabajar con las variables de sesion
session_start();

//obtenemos las funciones necesarias para conectarnos a la base de datos
 // - - - - - DB conection & work
 $fileLink = "../mybackend/_php_librarys/_db.php";
 if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

 // - - - - - Entity functions
 $fileLink = "../mybackend/_php_librarys/_functions_generic.php";
 if ( file_exists( $fileLink ) ) { include( $fileLink ); } else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }


//en el caso que hayamos recibido correctamente el form de login.php
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
        //guardamos en un array de sesion los datos relacionados con el usuario
        $_SESSION['user']['id'] = $result['id'];
        $_SESSION['user']['cid'] = $result['cid'];
        $_SESSION['user']['name'] = $result['nombre'];
        $_SESSION['user']['email'] = $result['email'];
        $_SESSION['user']['ticket'] = $result['ticket'];
        $_SESSION['total'] = $result['puntuacion'];
        if ( !empty( $result['json'] ) ) { 
            $_SESSION['games'] = json_decode( $result['json'], true ); 
        } else {
            //inicializamos los datos de juego del usuario
            $gamesArray = GetIdedArray( getEntity( "juego", 0, 3 ) );
            foreach($gamesArray as $key => $data){
                $_SESSION['games'][$key]['score'] = 0;
                $_SESSION['games'][$key]['active'] = false;
            } 
        }
        //nos vamos a la home
        header("Location: ../index.php");
        exit();
    } else {
        //almacenamos en una variable de sesión diferente a la de user, el correo con el que se ha intentado acceder
        $_SESSION['email'] = $_POST['email'];
        //volvemos al login
        header("Location: ../login.php");
        exit();
    }
}
