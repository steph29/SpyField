<?php 
session_start();
include('dbconfig.php') ;

if(isset($_POST['add_mission'])){

$missiontype = $_POST['missiontype'];
$country = $_POST['country'];
$target = $_POST['target'];
$agent = $_POST['agent'];

$postData = [
    'missiontype' => $missiontype,
    'country' => $country,
    'target' => $target,
    'agent' => $agent,
];

$ref_table = 'missions/';
$postRef = $database->getReference($ref_table)->push($postData);

 if($postRef){

        $_SESSION['status'] = "Mission saved " . $login;
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Mission unsaved. Something were wrong ";
        header('Location: admin');
    }

}

?>