<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<!-- <h1>Hy <?php 
include('../config/dbconfig.php');
$users = $auth->listUsers();
?> <?= $users->displayName;
?></h1> -->

<div class="container">
    <div class="row ">
<div class="col-md-12 justify-content-center align-items-center d-flex">
            <div>
                      <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>
</div>
 </div>
 </div>
</div>

<div class="container-fluid">
    <form action="<?= $router->generate('code')?>" method="post">
    <div class="row">
        <div class="col">
            <section class="container ">
        <h3 class="text-center ">Select the mission</h3>
        <div class="form-group my-3">
          <label class="col-form-label">Mission Title</label>
          <input type="text" class="form-control" name="mission"/>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Code Name</label>
          <input type="text" class="form-control" name="codeName"/>
        </div>
    <div class="form-group my-3">
 <label class="col-form-label">Agent </label>
    <select name="agent" class="form-control text-center linked-select">
    <option >Select your Agent</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'agent/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['callsign'] ; ?>" > <?= $row['callsign'] ; ?> </option>

      <?php
        }
    }
     ?>
    </select>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Target </label>
          <input type="text" class="form-control" name="target"/>
        </div>

    <div class="form-group my-3">
          <label class="col-form-label">Description </label>
    <textarea type="text" cols="10" rows="5" name="desc"></textarea>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Country </label>
          <input type="text" class="form-control" name="country"/>
        </div>
   
        </section>
</div>

    <div class="col">
        <section class="container ">
            <h3 class="text-center ">Select the mission</h3>
            <div class="form-group my-3">
                <label class="col-form-label">Select the Contact</label>
                <select name="agent" class="form-control text-center linked-select">
    <option >Select your contact</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'contact/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['callsign'] ; ?>" > <?= $row['callsign'] ; ?> </option>

      <?php
        }
    }
     ?>
    </select>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Type of mission </label>
          <input type="text" class="form-control" name="type"/>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Status </label>
          <input type="text" class="form-control" name="status"/>
        </div>
            <div class="form-group my-3">
                <label class="col-form-label">Hideouts </label>
                <input type="adress" class="form-control" name="hideouts"/>
            </div>
            <div class="form-group my-3">
                <label class="col-form-label">Specialyties </label>
                <input type="text" class="form-control" name="specialities"/>
            </div>
            <div class="form-group my-3">
                <label class="col-form-label">Date of beginning </label>
                <input type="date" class="form-control" name="startDate"/>
            </div>
            <div class="form-group my-3">
                <label class="col-form-label">Date of end </label>
                <input type="date" class="form-control" name="endDate"/>
            </div>
        </section>
    
    </div>
    <div class="col">
        <section class="container ">
            <h3 class="text-center ">To resume</h3>
                <div class="form-group mb-3">      
                    <button type="submit" class="btn btn-outline-success float-end mx-1 loginButton" name="add_mission">Start mission</button>
                </div>             
                           
                <div class="form-group mb-3">      
                    <a href="<?= $router->generate('agent')?>" class="btn btn-outline-success float-end loginButton mx-1">New Agent</a>
                </div> 
                <div class="form-group mb-3">   
                    <button type="submit" class="btn btn-outline-danger float-end mx-1 loginButton" name="">Cancel</button>
                </div>  
            </div>
    </div>
</section>
    </form>    
</div>
