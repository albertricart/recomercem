<?php 

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Open DDBB =>

function openDB() {

    // visualiza en consola el data caller
    //getBackTrace();

    // - - - - - DB Data conection
    if ( file_exists( "../../_data/db.php" ) ) { include( "../../_data/db.php" );  } 
    else if ( file_exists( "../_data/db.php" ) ) { include( "../_data/db.php" );  }     


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

function getEntity( $the_table, int $the_id, int $the_sort = 0, int $the_direction = 0, int $the_limit = 0, string $the_search = "" ) {

    // - - - - - Tables Data
    if ( file_exists( "../../_data/tb_data.php" ) ) { include( "../../_data/tb_data.php" ); }
    else if ( file_exists( "../_data/tb_data.php" ) ) { include( "../_data/tb_data.php" ); }

    $theResult = null;
    
    switch ( $the_sort ) { 
        case 1: $addStringQuery = " ORDER BY nombre".(($the_direction==0)?' ASC':' DESC'); break;
        case 2: $addStringQuery = " ORDER BY cid".(($the_direction==0)?' ASC':' DESC');  break;
        case 3: $addStringQuery = " ORDER BY orden".(($the_direction==0)?' ASC':' DESC');  break;
        default: $addStringQuery = "";
    }

    if ( $the_limit > 0 ) { $addStringQuery.= ' LIMIT ' . $the_limit; }


    if ( !empty( $the_table ) ) {

        $myCnctn = openDB();

        $myQueryText = "SELECT * FROM ".$dbTableAry[ $the_table ][ 'tableName' ].(($the_id>0)?" WHERE ".$dbTableAry[ $the_table ][ 'tableKey' ]." = ".$the_id:$the_search).$addStringQuery;
        //echo $myQueryText.'<br>';
        //echo '<script>console.log("'.$myQueryText.'")</script>';

        $myQuery = $myCnctn->prepare( $myQueryText );

        $myQuery->execute();

        $theResult = $myQuery->fetchAll();

        $myCnctn = closeDB();

    }

    return $theResult;

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  Select Entity //


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Save Entity =>

function saveEntity( string $the_table, $the_dataAry, $the_condition = array() ) {

    // - - - - - Tables Data
    if ( file_exists( "../../_data/tb_data.php" ) ) { include( "../../_data/tb_data.php" ); } 
    else if ( file_exists( "../_data/tb_data.php" ) ) { include( "../_data/tb_data.php" ); } 

    $theReturn = "";
    
    $isOK = true;

    // controla que la tabla exista
    if ( empty( $dbTableAry[ $the_table ] ) ) { $isOK = false; }

    // controla que el array de datos no este vacio
    if ( empty( $the_dataAry ) ) { $isOK = false; }

    if ( $isOK ) {

        // genera control si es master o driver
        if ( $dbTableAry[ $the_table ][ 'tableType' ] == 0 ) { $isMaster = true; } else { $isMaster = false; }

        // genera control por si es nuevo o modificacion        
        if ( !empty($the_condition) || !empty( $the_dataAry[ $dbTableAry[ $the_table ][ 'tableKey' ] ] ) ) { $isNew = false; } else  { $isNew = true; }

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
                " WHERE " . ((empty($the_condition)) ? $dbTableAry[ $the_table ][ 'tableKey' ] . " = " . $the_dataAry[ $dbTableAry[ $the_table ][ 'tableKey' ] ] : $the_condition['field'] . " = " . $the_condition['content'] ) . ";";

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

            $theReturn = handlePDOErrorMessage($e);
            $isOK = false;

        }

        //echo '<br /><br />'."debugDumpParams (save): ";
        //$myQuery->debugDumpParams();
        //echo "<br /><br />";

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
    if ( file_exists( "../../_data/tb_data.php" ) ) { include( "../../_data/tb_data.php" ); } 
    else if ( file_exists( "../_data/tb_data.php" ) ) { include( "../_data/tb_data.php" ); } 
    
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


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - handlePDOErrorMessage =>
function handlePDOErrorMessage($PDOException) {

    $errorMessage = "";

    if (!empty($PDOException->errorInfo[1])) {

        switch ($PDOException->errorInfo[1]) {
                //MySQL server-side error codes
            case 1005:
                $errorMessage = "No se ha podido crear la tabla (" . $PDOException->errorInfo[2] . ")";
                break;
            case 1044:
                $errorMessage = "Acceso denegado al acceder a la base de datos, usuario/password incorrectos";
                break;
            case 1049:
                $errorMessage = "Base de datos desconocida";
                break;
            case 1050:
                $errorMessage = "Tabla ya existente";
                break;
            case 1051:
                $errorMessage = "Tabla desconocida";
                break;
            case 1054:
                $errorMessage = "Columna desconocida";
                break;
            case 1062:
                $errorMessage = "Este registro ya existe";
                break;
            default:
                $errorMessage = "Error " . $PDOException->errorInfo[1] . ": " . $PDOException->errorInfo[2];
                break;
        }

    } else {

        switch ($PDOException->getCode()) {
            case 1044:
                $errorMessage = "Acceso denegado al acceder a la base de datos, usuario/password incorrectos";
                break;
            case 1049:
                $errorMessage = "Base de datos desconocida";
                break;
            case 2002:
                $errorMessage = "No se encuentra el servidor";
                break;
            default:
                $errorMessage = "Error " . $PDOException->getCode() . ": " . $PDOException->getMessage();
                break;
        }

    }

    return $errorMessage;

}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - handlePDOErrorMessage //


