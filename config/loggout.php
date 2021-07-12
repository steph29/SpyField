<?php 
session_start();

$pageTitle="Logout";
$pageDesc="Thanks for your visit. Remember, be careful behind you ... ";

unset($_SESSION[ 'verified_user_id']);
unset($_SESSION[ 'idTokenString']);
        
$_SESSION['status'] = "logged out";
header('Location: login');

?>