<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - DB Data conection
include_once("../php_librarys/db.php"); 
// - - - - - Pokemon functions
include_once("../php_librarys/functions_pokedex.php"); 
// - - - - - General SETs
include_once("../php_controllers/generalSet.php"); 

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

                    // - - - - - Almacena Pokemon
                    $theResult = setPokemon( 0, $_POST['txtNumero'], $_POST['txtNombre'], $_POST['txtAltura'], $_POST['txtPeso'], $_POST['txtEvolucion'], (($imgOK)?$_FILES['nptImagen']['name']:""), $_POST['cbxRegion'], $_POST['chxTipo'] );

                }

                if ( empty( $theResult ) ) {

                    header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( "Pokemon añadido correctamente" ) );

                } else {

                    header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( $theResult ) );
                }

            } else {

                // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion
                $_SESSION = array();
                                
                // echo "SQL_INSERT"; var_dump($_SESSION); exit(0);
                header("Location: ../php_views/pokemon.php");

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_INSERT //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE =>
        case SQL_UPDATE: 

            if ( !empty( $_POST['idOriginAction'] ) ) {

                if ( !empty($_POST['numId']) && !empty( $_POST['txtNumero'] ) && !empty( $_POST['txtNombre'] ) ) { 

                    session_start();	// genera array asociativo con los datos de sesion
                    $_SESSION = array();                    

                    // - - - - - Almacena Pokemon
                    $theResult = setPokemon( $_POST['numId'], $_POST['txtNumero'], $_POST['txtNombre'], $_POST['txtAltura'], $_POST['txtPeso'], $_POST['txtEvolucion'], (($imgOK)?$_FILES['nptImagen']['name']:""), $_POST['cbxRegion'], $_POST['chxTipo'] );

                }

                if ( empty( $theResult ) ) {

                    header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( "Pokemon modificado correctamente" ) );

                } else {

                    header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( $theResult ) );

                }

            } else if ( !empty( $_POST['idPokemon'] ) ) { 

                // - - - - - Load Pokeon Data if exists
               	// 'pokemons' => array( 'id' => 0,'numero' => 0,'nombre' => '','altura' => 0,'peso' => 0,'evolucion' => '','imagen' => '','regiones_id' => 0 )
               	$PokemonsAry = GetIdedArray( getDataes( "pokemons", $_POST['idPokemon'] ) );
              	// tipos_has_pokemons [ 0.'tipos_id', 1.'pokemons_id' ]
               	$HasTipoAry = getDataes( "tipos_has_pokemons", $_POST['idPokemon'] );

                   // - - - - - almacena en session
                session_start();	// genera array asociativo con los datos de sesion
                $_SESSION = array();

                foreach( $PokemonsAry[$_POST['idPokemon']] as $theK => $theD ) { $_SESSION[$theK] = $theD; }
                $_SESSION['tipos'] = $HasTipoAry; 

                // echo "SQL_UPDATE"; var_dump($_SESSION); exit(0);
                header("Location: ../php_views/pokemon.php");

            } else {

                echo 'empty( $_SESSION["save"] ) && $_POST["idPokemon"]';

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_UPDATE //

        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE =>   
        // Si venim de fer click per esborrar:
        // - Ens guardem el pokemon a una variable.
        // - Cridem a la funció per esborrar el pokemon de la base de dades.
        // - Esborrem la imatge del pokemon guardat del servidor.
        case SQL_DELETE: 

            if ( !empty( $_POST['idPokemon'] ) ) { 

                // - - - - - Elimina Pokemon
                $theResult = delPokemon( $_POST['idPokemon'] );

            }

            if ( empty( $theResult ) ) {

                header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( "Pokemon eliminado correctamente" ) );

            } else {

                header( "Location: ../php_views/pokemon_list.php?retu=".urlencode( $theResult ) );

            }

        break;
        // - - - - - - - - - - - - - - - - - - - - - - SQL_DELETE //

    }

}

exit(0);

?>