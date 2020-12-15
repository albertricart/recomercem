<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - Tables Data
$fileLink = "../../_data/tb_data.php"; 
if ( file_exists( $fileLink ) ) { include( $fileLink ); } 
else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }
// - - - - - General SETs
$fileLink = "_php_controllers/_generalSet.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } 
else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }
// - - - - - DB conection & work
$fileLink = "_php_librarys/_db.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } 
else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }
// - - - - - Entity functions
$fileLink = "_php_librarys/_functions_generic.php";
if ( file_exists( $fileLink ) ) { include( $fileLink ); } 
else { echo "Error: not exists '".$fileLink."' (".getcwd().")<br>"; }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //


// - - - - - VARS //
$theResult = "";
$entityKey = "juego";
$includeString = "juegos_list.php";
$includeChange = "juegos_form.php";
$retu = "";

// - - - - - - - - - - get ScriptName
$scriptName = explode( '/', $_SERVER['PHP_SELF']);
$scriptName = explode( '.', $scriptName[ count($scriptName)-1 ] );
$scriptName = $scriptName[0];

// - - - - - control de uso de CID de imagen
if ( !empty( $dbTableAry[ $entityKey ][ 'tableFields' ][ 'cid' ] ) ) { 
    $useCID = true; 
    if ( empty( $_POST['cid'] ) ) { $cid = $dbTableAry[ $entityKey ][ 'tableCode' ] . dechex ( time() ); }
    else { $cid = $_POST['cid']; }
} else { $useCID = false; }


// - - - - - controla y graba imagen
if ( empty( $_FILES["imagen"] ) ) { $imgOK = false; }
elseif ( !is_uploaded_file( $_FILES['imagen']['tmp_name'] ) ) { $imgOK = false; }
elseif ( !move_uploaded_file( $_FILES['imagen']['tmp_name'], "../images/uploaded/".$cid.".jpg" ) ) { $imgOK = false; }
else { $imgOK = true; }


// - - - - - controla entityId
if ( isset( $_POST[ 'entityId' ] ) ) { $entityId = $_POST[ 'entityId' ]; } else { $entityId = 0; }


// - - - - - switch de acciones
if( !empty( $_REQUEST['idAction'] ) ) { 

    switch( $_REQUEST['idAction'] ) {

        // - - - - - - - - - - - - - - - - - - - - - - SQL_INSERT =>
        case SQL_INSERT: 

            if ( !empty( $_POST['idOriginAction'] ) ) {
                
                // - - - - - session
                // $_SESSION = array();

                if ( !empty( $_POST['nombre'] ) ) { 

                    $tmpDataAry = array();
                    foreach ( $dbTableAry[ $entityKey ][ 'tableFields' ] as $tmpKey => $tmpData ) {
                        if ( isset( $_POST[$tmpKey] ) ) { $tmpDataAry[$tmpKey] = $_POST[$tmpKey]; } 
                    }
                    // - - - - - agrega cid de imagen
                    if ( $useCID ) { $tmpDataAry['cid'] = $cid; }

                    // - - - - - Almacena Datos
                    $theResult = saveEntity( $entityKey, $tmpDataAry );

                }

                $retu = urlencode( ((empty($theResult))?"Entidad añadida correctamente":$theResult) );

            } else {

                // - - - - - session
                // $_SESSION = array();
                                
                // echo "SQL_INSERT"; var_dump($_SESSION);
                $includeString = $includeChange;
                
            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_INSERT //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE =>
        case SQL_UPDATE: 

            if ( !empty( $_POST['idOriginAction'] ) ) {

                if ( !empty($_POST['id']) && !empty( $_POST['nombre'] ) ) { 

                    $_SESSION = array();                    

                    $tmpDataAry = array();
                    foreach ( $dbTableAry[ $entityKey ][ 'tableFields' ] as $tmpKey => $tmpData ) {
                        if ( isset( $_POST[$tmpKey] ) ) { $tmpDataAry[$tmpKey] = $_POST[$tmpKey]; } 
                    }

                    // - - - - - Almacena Datos
                    $theResult = saveEntity( $entityKey, $tmpDataAry );

                }

                $retu = urlencode( ((empty($theResult))?"Entidad modificada correctamente":$theResult) );

            } else if ( !empty( $_POST['entityId'] ) ) { 

                // - - - - - Load Data if exists
                $EntityAry = GetIdedArray( getEntity( $entityKey, $_POST['entityId'], 0 ) );
                   
                // - - - - - session
                // $_SESSION = array();
                // foreach( $EntityAry[$_POST['id']] as $tmpKey => $tmpData ) { $_SESSION[$tmpKey] = $tmpData; }

                // echo "SQL_UPDATE"."<br />"; echo "_REQUEST"."<br />"; var_dump($_REQUEST); echo "_SESSION"."<br />"; var_dump($_SESSION);
                $includeString = $includeChange;

            } else {

                // echo "SQL_UPDATE"."<br />"; echo "_REQUEST"."<br />"; var_dump($_REQUEST); echo "_SESSION"."<br />"; var_dump($_SESSION);
                echo 'empty( $_SESSION["save"] ) && $_POST["entityId"]';

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE =>   

        case SQL_DELETE: 

            if ( !empty( $_POST['entityId'] ) ) { 

                // - - - - - Elimina Registro
                $theResult = delEntity( $entityKey, $_POST['entityId'] );

            }

            $retu = urlencode( ((empty($theResult))?"Entidad eliminada correctamente":$theResult) );

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE //

    }

}

include_once( "_php_views/".$includeString );

?>