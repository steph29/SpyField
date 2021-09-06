<?php 
session_start();
include('dbconfig.php') ;

if(isset($_POST['country'])){
    $country_key = $_POST['country'];
    $ref_table = "countries/".$country_key;
    $dataCountryCapital = $database->getReference($ref_table)->getValue();

    if($dataCountryCapital > 0){
        $arrayCapital = array('capital' => $dataCountryCapital['capital']);
     echo json_encode( $arrayCapital );

    }
exit();
}

?>