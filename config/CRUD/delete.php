<?php 
session_start();
include('../config/dbconfig.php') ;


if(isset($_POST['delete'])){
    
    $del_id = $_POST['delete'];

    $ref_table = 'missions/'.$del_id;
    $deleteQuery = $database->getReference($ref_table)->remove();

    if($deleteQuery){

        $_SESSION['status'] = "Mission deleted";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Mission not deleted";
        header('Location: admin');
    }

   
}
elseif (isset($_POST['delete_contact'])) {
    $del_id = $_POST['delete_contact'];
    $ref_table_agent = "agent/".$del_id;

    $deleteQueryContact = $database->getReference($ref_table)->remove();

    if($deleteQueryContact){

        $_SESSION['status'] = "Agent deleted";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Agent not deleted";
        header('Location: admin');
    }
}

?>