<?php $pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<h1>Bienvenu sur la partie Admin</h1>

<?php 
session_start();
require '../config/dbconfig.php';

if(isset($_POST['submit'])){
    $name = $_POST['login'];
    $data = [ 
        'name' => $name,
    ];

    // Name of the database to insert in Firebase
    $ref = "users/";

    // Create a key for a new post
    $userData = $database ->getReference($ref)->push($data);

    if($userData){
        $_SESSION['status'] = "data inserted successfully";
        console.log($_SESSION['status']);
        
    }else{
    $_SESSION['status'] = "data not inserted. Something get wrong";
        console.log($_SESSION['status']);
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
            if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                ?> 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['status'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                unset($_SESSION['status']);
            }
            ?>
        </div>
    </div>
</div>