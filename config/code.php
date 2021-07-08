<?php 
session_start();
include('dbconfig.php') ;

if(isset($_POST['submit'])){

$name = $_POST['name'];
// password need to be hashed
$password = $_POST['password'];

$postData = [
    'name' => $name,
    'password' => $password
];

$ref_table = 'users';
$postRef = $database->getReference($ref_table)->push($postData);

 if($postRef_result){

        $_SESSION['status'] = "Contact Add Successfully";
        header('Location: /admin');
    }else{
         $_SESSION['status'] = "Contact not inserted. Something is wrong";
        header('Location: /admin');
    }

}

?>