<?php 
session_start();
include('dbconfig.php');

if (isset($_POST['mission'])) {
   $key_child = $_POST['mission'];

    $ref_table = 'missions/'.$key_child;
    $getData = $database->getReference($ref_table)->getValue();
    $country_key = $getData['countryId'];

    $ref_table_country = 'countries/'.$country_key;
    $getCountryData = $database->getReference($ref_table_country)->getValue();

 if($getCountryData > 0){   
     
     $array = array('lat' => $getCountryData['latlng'][0], 'lon'=> $getCountryData['latlng'][1], 'name' => $getCountryData['name']);
     echo json_encode( $array );
        exit();
} 
}
?>

