<?php 

include("../../../_data/create_data.php");

include("../_php_librarys/_db.php");

$myCnctn = openDB();

foreach( $databaseAry as $tmpData ) {

    $myQuery = $myCnctn->prepare( $tmpData );

}


$myQuery->execute();

$theResult = $myQuery->fetchAll();

$myCnctn = closeDB();

?>