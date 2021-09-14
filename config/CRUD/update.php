<?php
session_start();
include('../config/dbconfig.php') ;

if(isset($_POST['update_mission'])){

$key = $_POST['key'];
$mission = $_POST['mission'];
$codeName = $_POST['codeName'];
$desc = $_POST['desc'];
$type= $_POST['type'];
$contact= $_POST['contact'];
$status= $_POST['status'];
$hideouts= $_POST['hideouts'];
$specialities= $_POST['specialities'];
$startDate= $_POST['startDate'];
$endDate= $_POST['endDate'];
$country_key = $_POST['country'];
$target = $_POST['target'];
$agent = $_POST['agent'];



$postData = [
    'mission' => $mission,
    'codeName' => $codeName,
    'desc' => $desc,
    'type' => $type,
    'contact' => $contact,
    'status' => $status,
    'hideouts' => $hideouts,
    'specialities' => $specialities,
    'startDate' => $startDate,
    'endDate' => $endDate,
    'countryId' => $country_key,
    'target' => $target,
    'agent' => $agent,
    
];

$ref_table = 'missions/'.$key;
$updateQuery = $database->getReference($ref_table)->update($postData);

if($updateQuery){
        $_SESSION['status'] = "Mission updated";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Mission not updated";
        header('Location: admin');
    }
}

?>