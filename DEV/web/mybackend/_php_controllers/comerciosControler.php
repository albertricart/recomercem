<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - General SETs
if ( file_exists( "_generalSet.php" ) ) { include_once("_generalSet.php"); } else { echo "Error: not exists '_generalSet.php' (".getcwd().")"; }
// - - - - - DB conection & work
if ( file_exists( "../php_librarys/_db.php" ) ) { include_once("../php_librarys/_db.php"); } else { echo "Error: not exists '_functions_generic.php' (".getcwd().")"; }
// - - - - - Entity functions
if ( file_exists( "../php_librarys/_functions_generic.php" ) ) { include_once("../php_librarys/_functions_generic.php"); } else { echo "Error: not exists '_functions_generic.php' (".getcwd().")"; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - recibe parametros de formulario POST

// - - - - - controla y graba imagen
$imgOK = false;

if ( !empty( $_FILES["nptImagen"] ) && is_uploaded_file( $_FILES['nptImagen']['tmp_name'] ) && move_uploaded_file( $_FILES['nptImagen']['tmp_name'], "../media/img/uploaded/".$_FILES['nptImagen']['name'] ) ) { $imgOK = true; }

$theResult = "";

$includeString = "";
$retu = "";

// - - - - - switch de acciones
if( !empty( $_REQUEST['idAction'] ) ) { 

    switch( $_REQUEST['idAction'] ) {

        // - - - - - - - - - - - - - - - - - - - - - - SQL_INSERT =>
        case SQL_INSERT: 

            if ( !empty( $_POST['idOriginAction'] ) ) {
                
                session_start();	// genera array asociativo con los datos de sesion

                $_SESSION = array();

                if ( !empty( $_POST['txtNumero'] ) && !empty( $_POST['txtNombre'] ) ) { 

                    $tmpDataAry = array( $_POST['txtNumero'], $_POST['txtNombre'], $_POST['txtAltura'], $_POST['txtPeso'], $_POST['txtEvolucion'], (($imgOK)?$_FILES['nptImagen']['name']:""), $_POST['cbxRegion'], $_POST['chxTipo'] )

                    // - - - - - Almacena Datos
                    $theResult = saveEntity( 'comerc', $tmpDataAry );

                }

                $retu = urlencode( ((empty($theResult))?"Entidad añadida correctamente":$theResult) );
                $includeString = "comercios_list.php";

            } else {

                // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion
                $_SESSION = array();
                                
                // echo "SQL_INSERT"; var_dump($_SESSION);
                $includeString = "comercios_form.php";
                
            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_INSERT //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE =>
        case SQL_UPDATE: 

            if ( !empty( $_POST['idOriginAction'] ) ) {

                if ( !empty($_POST['entityId']) && !empty( $_POST['txtNumero'] ) && !empty( $_POST['txtNombre'] ) ) { 

                    session_start();	// genera array asociativo con los datos de sesion
                    $_SESSION = array();                    

                    $tmpDataAry = array( $_POST['txtNumero'], $_POST['txtNombre'], $_POST['txtAltura'], $_POST['txtPeso'], $_POST['txtEvolucion'], (($imgOK)?$_FILES['nptImagen']['name']:""), $_POST['cbxRegion'], $_POST['chxTipo'] )

                    // - - - - - Almacena Datos
                    $theResult = saveEntity( 'comerc', $tmpDataAry );

                }

                $retu = urlencode( ((empty($theResult))?"Entidad modificada correctamente":$theResult) );
                $includeString = "comercios_list.php";


            } else if ( !empty( $_POST['id'] ) ) { 

                // - - - - - Load Data if exists
                $EntityAry = GetIdedArray( getEntity( 'comerc', $_POST['id'] ) );
                   
                   // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion

                $_SESSION = array();

                foreach( $EntityAry[$_POST['id']] as $theK => $theD ) { $_SESSION[$theK] = $theD; }
                $_SESSION['tipos'] = $HasTipoAry; 

                // echo "SQL_UPDATE"; var_dump($_SESSION);
                $includeString = "comercios_form.php";

            } else {

                echo 'empty( $_SESSION["save"] ) && $_POST["id"]';

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE =>   

        case SQL_DELETE: 

            if ( !empty( $_POST['entityId'] ) ) { 

                // - - - - - Elimina Registro
                $theResult = delEntity( 'comerc', $_POST['entityId'] );

            }

            $retu = urlencode( ((empty($theResult))?"Entidad eliminada correctamente":$theResult) );
            $includeString = "comercios_list.php";            

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE //

    }

}

//include_once( "../_php_views/".$includeString );

?>