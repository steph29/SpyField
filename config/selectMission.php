<?php 
session_start();
include('dbconfig.php');


if (isset($_POST['missionType'])) {
   alert('je suis dans le fichier');
    $key = $_POST['mission'];
    $ref->getReference('missions')->getValue();

}
?>

