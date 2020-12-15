<?php 

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Open DDBB =>

function openDB() {

    // visualiza en consola el data caller
    getBackTrace();

    // - - - - - DB Data conection
    $fileLink = "../../_data/db.php";
    if ( file_exists( $fileLink ) ) { include( $fileLink ); consoleLog( "Included '".$fileLink."' (".getcwd().")" ); } 
    else { consoleLog( "Error: not exists '".$fileLink."' (".getcwd().")" ); }

    try {

    	$myCnctn = new PDO( "mysql:host=$servername; dbname=$myDB", $username, $password );

    	$myCnctn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $myCnctn->exec( "set names utf8" );

    } catch(PDOException $e) { echo "Connection failed: " . $e->getMessage(); }

    return $myCnctn;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Open DDBB //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Close DDBB =>

function closeDB() {

	return null;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Close DDBB //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Select Entity =>

function getEntity( $the_table, int $the_id, int $the_sort ) {

    // - - - - - Tables Data
    $fileLink = "../../_data/tb_data.php"; if ( file_exists( $fileLink ) ) { include( $fileLink ); } 

    $theResult = null;
    
    switch ( $the_sort ) { 
        case 1: $stringSort = " ORDER BY nombre";  break;
        case 2: $stringSort = " ORDER BY cid";  break;
        default: $stringSort = "";
    }

    if ( !empty( $the_table ) ) {

        $myCnctn = openDB();

        $myQueryText = "SELECT * FROM ".$dbTableAry[ $the_table ][ 'tableName' ].(($the_id>0)?" WHERE ".$dbTableAry[ $the_table ][ 'tableKey' ]." = ".$the_id:"").$stringSort;
        //echo $myQueryText.'<br>';

        $myQuery = $myCnctn->prepare( $myQueryText );

        $myQuery->execute();

        $theResult = $myQuery->fetchAll();

        $myCnctn = closeDB();

    }

    return $theResult;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  Select Entity //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Save Entity =>

function saveEntity( string $the_table, $the_dataAry ) {

    // - - - - - Tables Data
    $fileLink = "../../_data/tb_data.php"; if ( file_exists( $fileLink ) ) { include( $fileLink ); } 

    $theReturn = "";
    
    $isOK = true;

    // controla que la tabla exista
    if ( empty( $dbTableAry[ $the_table ] ) ) { $isOK = false; }

    // controla que el array de datos no este vacio
    if ( empty( $the_dataAry ) ) { $isOK = false; }

    // genera control si es master o driver
    if ( $isOK && $dbTableAry[ $the_table ][ 'tableType' ] == 0 ) { $isMaster = true; } else { $isMaster = false; }

    // genera control por si es nuevo o modificacion        
    if ( $isOK && !empty( $the_dataAry[ $dbTableAry[ $the_table ][ 'tableKey' ] ] ) ) { $isNew = false; } else  { $isNew = true; }

    if ( $isOK ) {

        // genera query 
        $myQueryText = '';

        if ( $isNew ) {

            $myQueryFieldList = '';
            $myQueryFieldValues = '';

            foreach ( $dbTableAry[ $the_table ][ 'tableFields' ] as $tmpKey => $tmpData ) {

                if ( !empty( $the_dataAry[ $tmpKey ] ) ) {

                    $myQueryFieldList.= ((!empty($myQueryFieldList))?', ':'') . $tmpKey;
                    $myQueryFieldValues.= ((!empty($myQueryFieldValues))?', ':'') . ':' . $tmpKey;

                }    
            }

            $myQueryText = "INSERT INTO `". $dbTableAry[ $the_table ][ 'tableName' ] . "` ( " .  $myQueryFieldList . " ) VALUES ( " . $myQueryFieldValues . " );";

        } else {
        
            $myQueryFieldList = '';
            $myQueryFieldValues = '';

            foreach ( $dbTableAry[ $the_table ][ 'tableFields' ] as $tmpKey => $tmpData ) {

                if ( !empty( $the_dataAry[ $tmpKey ] ) ) {

                    $myQueryFieldList.= ((!empty($myQueryFieldList))?', ':'') . $tmpKey . ' = :' . $tmpKey;

                }    
            }

            $myQueryText = "UPDATE `" . $dbTableAry[ $the_table ][ 'tableName' ] . 
                "` SET " .  $myQueryFieldList .
                " WHERE " . $dbTableAry[ $the_table ][ 'tableKey' ] . " = " . $the_dataAry[ $dbTableAry[ $the_table ][ 'tableKey' ] ] . ";";

        }

        // save data using PDO

        $myCnctn = openDB();

        $myCnctn->beginTransaction(); // - - - - - desactiva autocommit

        $myQuery = $myCnctn->prepare( $myQueryText );

        // binding parameters
        foreach ( $dbTableAry[ $the_table ][ 'tableFields' ] as $tmpKey => $tmpData ) {

            if ( !empty( $the_dataAry[ $tmpKey ] ) ) {

                if ( $tmpData['crypt'] ) { $the_dataAry[$tmpKey] = crypt( $the_dataAry[$tmpKey], 'magomo' ); }

                $myQuery->bindParam( ':'.$tmpKey, $the_dataAry[$tmpKey] );

            }    
        }

        // execute & control
        try {

            $myQuery->execute();

        } catch (PDOException $e) {

            $theReturn = 'Error: ' . $e->getMessage();
            $isOK = false;

        }

        // - - - - - verifica estado de grabacion
        if ( $isOK ) { // estado OK, graba informacion

            $myCnctn->commit();

        } else { // estado ko, restaura estado VER SI ES CORRECTO EL ROLLBACK POSTERIOR A UN COMMIT

            $myCnctn->rollBack();

        }

        $myCnctn = closeDB();

    }

    return $theReturn;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Save Entity //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Delete Entity =>

function delEntity( string $the_table, int $the_id ) {

    // - - - - - Tables Data
    $fileLink = "../../_data/tb_data.php"; if ( file_exists( $fileLink ) ) { include( $fileLink ); } 

    $isOK = true;

    $theReturn = "";

    if ( !empty($dbTableAry[$the_table]) && $the_id > 0 ) {

        // - - - - - recupera nombre imagen para eliminar
        $myCnctn = openDB();

        $myCnctn->beginTransaction(); // - - - - - desactiva autocommit

        $myQueryText = "DELETE FROM " . $dbTableAry[ $the_table ][ 'tableName' ] . " WHERE " . $dbTableAry[ $the_table ][ 'tableKey' ] . " = :id;";

        $myQuery = $myCnctn->prepare( $myQueryText );

        $myQuery->bindParam( ":id", $the_id, PDO::PARAM_INT );

        // execute & control
        try {

            $myQuery->execute();

        } catch (PDOException $e) {

            $theReturn = 'Error: ' . $e->getMessage();
            $isOK = false;

        }

        // echo "debugDumpParams (delete)<br>";
        // $myQuery->debugDumpParams();
        // echo "<br>";

        // - - - - - verifica estado de grabacion
        if ( $isOK ) { // estado OK, graba informacion

            $myCnctn->commit();

        } else { // estado ko, restaura estado VER SI ES CORRECTO EL ROLLBACK POSTERIOR A UN COMMIT

            $myCnctn->rollBack();

        }

        $myCnctn = closeDB();

    }

    return $theReturn;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Delete Entity //

?>