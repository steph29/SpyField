<?php
session_start();
include('../config/dbconfig.php') ;

if(isset($_POST['update_contact'])){

$key = $_POST['key'];
$missiontype = $_POST['missiontype'];
$country = $_POST['country'];
$target = $_POST['target'];
$agent = $_POST['agent'];

$updateData = [
    'missiontype' => $missiontype,
    'country' => $country,
    'target' => $target,
    'agent' => $agent,
];

$ref_table = 'missions/'.$key;
$updateQuery = $database->getReference($ref_table)->update($updateData);

if($updateQuery){
        $_SESSION['status'] = "Mission updated";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Mission not updated";
        header('Location: admin');
    }
}

?>