<?php 
session_start();
include('dbconfig.php') ;

if(isset($_POST['submit'])){

$login = $_POST['login'];
$password = $_POST['password'];

$postData = [
    'login' => $login,
    'password' => $password,
];

$ref_table = 'users/';
$postRef = $database->getReference($ref_table)->push($postData);

 if($postRef){

        $_SESSION['status'] = "welcome, Dear " . $login;
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Connexion failed. Are you really allowed? ";
        header('Location: admin');
    }

}

?>