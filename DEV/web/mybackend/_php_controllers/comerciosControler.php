<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - General SETs
include_once("generalSet.php"); 
// - - - - - DB Data conection
include_once("../php_librarys/_db.php"); 
// - - - - - Entity functions
include_once("../php_librarys/functions_generic.php"); 

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - recibe parametros de formulario POST

// - - - - - controla y graba imagen
$imgOK = false;

if ( !empty( $_FILES["nptImagen"] ) && is_uploaded_file( $_FILES['nptImagen']['tmp_name'] ) && move_uploaded_file( $_FILES['nptImagen']['tmp_name'], "../media/img/uploaded/".$_FILES['nptImagen']['name'] ) ) { $imgOK = true; }

$theResult = "";

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

                if ( empty( $theResult ) ) {

                    header( "Location: ../php_views/comercios_list.php?retu=".urlencode( "Entidad añadida correctamente" ) );

                } else {

                    header( "Location: ../php_views/comercios_list.php?retu=".urlencode( $theResult ) );
                }

            } else {

                // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion
                $_SESSION = array();
                                
                // echo "SQL_INSERT"; var_dump($_SESSION); exit(0);
                header("Location: ../php_views/comercios_form.php");

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

                if ( empty( $theResult ) ) {

                    header( "Location: ../php_views/comercios_list.php?retu=".urlencode( "Comercio modificado correctamente" ) );

                } else {

                    header( "Location: ../php_views/comercios_list.php?retu=".urlencode( $theResult ) );

                }

            } else if ( !empty( $_POST['id'] ) ) { 

                // - - - - - Load Data if exists
                $EntityAry = GetIdedArray( getEntity( 'comerc', $_POST['id'] ) );
                   
                   // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion

                $_SESSION = array();

                foreach( $EntityAry[$_POST['id']] as $theK => $theD ) { $_SESSION[$theK] = $theD; }
                $_SESSION['tipos'] = $HasTipoAry; 

                // echo "SQL_UPDATE"; var_dump($_SESSION); exit(0);
                header("Location: ../php_views/comercios_form.php");

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

            if ( empty( $theResult ) ) {

                header( "Location: ../php_views/comercios_list.php?retu=".urlencode( "Entidad eliminada correctamente" ) );

            } else {

                header( "Location: ../php_views/comercios_list.php?retu=".urlencode( $theResult ) );

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE //

    }

}

exit(0);

?>