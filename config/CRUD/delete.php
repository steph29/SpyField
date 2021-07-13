<?php 
session_start();
include('../config/dbconfig.php') ;


if(isset($_POST['delete'])){
    
    $del_id = $_POST['delete'];

    $ref_table = 'missions/'.$del_id;
    $deleteQuery = $database->getReference($ref_table)->remove();

    if($deleteQuery){

        $_SESSION['status'] = "Mission deleted";
        header('Location: mission');
    }else{
         $_SESSION['status'] = "Mission not deleted";
        header('Location: mission');
    }
}


?>