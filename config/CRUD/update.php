<?php
session_start();
include('../config/dbconfig.php') ;

if(isset($_POST['update_contact'])){

$key = $_POST['key'];
$login = $_POST['login'];
// password need to be hashed
$password = $_POST['password'];

$updateData = [
    'login' => $login,
    'password' => $password,
];

$ref_table = 'users/'.$key;
$updateQuery = $database->getReference($ref_table)->update($updateData);

if($updateQuery){

        $_SESSION['status'] = "Contact updated";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Contact not updated";
        header('Location: admin');
    }
}

?>