<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Retorna array asociativo de resultado de consulta fetchAll en modo default (FETCH_BOTH) con indice asociado al id
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
function GetIdedArray( $theArray ) {

    $tmpAry = array();

    if (  !empty($theArray) ) {

        foreach( $theArray as $tmpDataAry ) {

            foreach( $tmpDataAry as $tmpKey => $tmpData ) {
            
                if ( gettype( $tmpKey ) == "string" ) { $tmpId = $tmpKey; }
                else { $tmpAry[$tmpDataAry[0]][$tmpId] = $tmpData; }

            }

        }

    }

    return $tmpAry;

}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FUNCIONES DE TABLA POKEMON //

?>