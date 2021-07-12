<?php 
session_start();
include('../config/dbconfig.php') ;


if(isset($_POST['delete'])){
    
    $del_id = $_POST['delete'];

    $ref_table = 'users/'.$del_id;
    $deleteQuery = $database->getReference($ref_table)->remove();

    if($deleteQuery){

        $_SESSION['status'] = "Contact deleted";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Contact not deleted";
        header('Location: admin');
    }
}


?>