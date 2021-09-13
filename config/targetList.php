<?php 
session_start();
include('dbconfig.php') ;

$arrayTarget = array();
if(isset($_POST['target'])){
    $ref_table = "target/";
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            array_push($arrayTarget, $row['callsign'] ,$key);
        }
        echo json_encode( $arrayTarget );
    };
exit();
}




?>