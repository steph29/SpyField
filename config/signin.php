<?php 
session_start();
include('dbconfig.php');


if(isset($_POST['register'])){
     $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    $userProperties = [
    'email' => $email,
    'emailVerified' => false,
    'phoneNumber' => '+33'.$phone,
    'password' => $password,
    'displayName' => $fullname,
];

    $createdUser = $auth->createUser($userProperties);

if($createdUser){

        $_SESSION['status'] = "User created successfully";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "User not created. Something is wrong";
        header('Location: register');
    }

}


?>