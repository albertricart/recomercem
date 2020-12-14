<?php 

echo "Creating tables reComercem ... "."<br>";

$isOK = true;

if ( file_exists( "../../../_data/create_data.php" ) ) { include_once("../../../_data/create_data.php"); }
else { echo "no existe '../../../_data/create_data.php'"; $isOK = false; }

if ( file_exists( "../_php_librarys/_db.php" ) ) { include("../_php_librarys/_db.php"); } 
else { echo "no existe '../_php_librarys/_db.php'"; }

if ( $isOK ) {

    $myCnctn = openDB();

    try { // execute & control

        foreach( $databaseAry as $tmpData ) {

            echo "Preparing: " . $tmpData . "<br>";
            $myQuery = $myCnctn->prepare( $tmpData );
               
            echo "Executing PDO ... " . "<br><br>";
            $myQuery->execute();

        }

    } catch (PDOException $e) { echo 'Error: ' . $e->getMessage(); $isOK = false; }

    if ( $isOK ) { 
        
        $myCnctn->commit(); 
        echo "Commiting PDO ... " . "<br>";

    }

    $myCnctn = closeDB();

}

echo "... tables created (?)" . "<br>";

?>