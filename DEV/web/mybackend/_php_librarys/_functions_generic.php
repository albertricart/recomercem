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


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Retorna array asociativo de resultado de consulta fetchAll en modo default (FETCH_BOTH) con indice asociado al id
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
function GetSingleRow( $theArray ) {

    $tmpAry = array();

    if ( !empty($theArray) ) {

        $tmpId = '';

        foreach( $theArray[0] as $tmpKey => $tmpData ) {

            if ( gettype( $tmpKey ) == "string" ) { $tmpId = $tmpKey; }
            else { $tmpAry[$tmpId] = $tmpData; }

        }

    }

    return $tmpAry;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Visualiza mensaje en consola de navegador
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

function consoleLog( $varLog ) {

    echo '<script>console.log("' . addslashes( $varLog ) . '")</script>';

}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Visualiza datos de caller from debug_backtrace
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

function getBackTrace() {

    $backTraceAry = debug_backtrace(); $printComma = false;
    $varLog = "";

    if (!empty($backTraceAry[2])) {

        $varLog.= "** called from ".$backTraceAry[2]["function"]." ( ";

        foreach( $backTraceAry[2]["args"] as $tmpData ) { $varLog.= (($printComma)?', ':'').print_r($tmpData,true); $printComma = true; }

        $varLog.= " ) in line ".$backTraceAry[2]["line"]." | file ".$backTraceAry[1]["file"];
        consoleLog( $varLog );

    }

}

?>