<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<h1>Bienvenu sur la partie Admin</h1>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['status'])){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>
        </div>
    </div>
</div>