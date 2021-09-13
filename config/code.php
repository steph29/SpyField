<?php 
session_start();
include('dbconfig.php') ;

if(isset($_POST['add_mission'])){

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

$ref_table = 'missions/';
$postRef = $database->getReference($ref_table)->push($postData);

 if($postRef){

        $_SESSION['status'] = "Mission created ";
        header('Location: mission');
    }else{
         $_SESSION['status'] = "Mission uncreated. Something were wrong ";
        header('Location: admin');
    }
    echo json_encode($postData);

}

?>