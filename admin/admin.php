<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<!-- <h1>Hy <?php 
include('../config/dbconfig.php');
$users = $auth->listUsers();
?> <?= $users->displayName;
?></h1> -->

<?php include('../elements/status.php') ;?>


<div>
    <section class="container d-flex justify-content-center">
        <table class="">
            <thead>
                <th class="col-md-8">Mission </th>
                <th class="col-auto"> edit</th>
                <th class="col-auto">Delete</th>
            </thead>
            <tbody>
                <?= 
                            include("../config/dbconfig.php");

                            $ref_table = 'missions/';
                            $fetchData = $database->getReference($ref_table)->getValue();

                            if($fetchData > 0){
                                $i = 0;
                                
                                foreach ($fetchData as $key => $row) {
                                    ?>
                                        <tr>
                                            <td> <?= $row['mission'] ;?></td>
                                            <?php 
                                            if(isset($_SESSION[ 'verified_user_id'])): 
                                            ?>
                                            <td> <a href="/create?id=<?= $key ;?>" class="btn btn-outline-success btn-sm ">
                                            <img src="/assets/write.png" alt="">
                                        </a></td>
                                            <td>
                                                <form action="<?= $router->generate('delete')?>" method="post">
                                                    <button type="submit" name="delete" value="<?= $key?>" class="btn btn-outline-danger btn-sm my-0">
                                                <img src="/assets/bin.png" alt="">
                                                </button>
                                                </form>
                                            </td>
                                            <?php endif;?>
                                        </tr>
                                    <?php 
                                }

                            } else {

                                ?>

                                <tr>
                                    <td colspan=  "2"> No record Found</td>
                                </tr>
                                <?php 
                            }
                            ?>
            </tbody>
        </table>
    </section>
</div>

<!-- First section -> create a mission -->

<div class="container mt-3">
    <form action="<?= $router->generate('code')?>" method="post">
        <section class="container">
            <h3 class="text-center mt-3">Create a new mission</h3>
        <div class="row">
            <!-- first col -->
            <div class="col">
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
</div> 
<!-- end of first col -->
<!-- second col -->
        <div class="col">
        <div class="form-group my-3">
                <label class="col-form-label">Select the Contact</label>
                <select name="contact" class="form-control text-center linked-select">
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
        </div>
          <!-- end of secont col  -->
          <div class="col ">
              <div class="form-group my-3">      
                  <button type="submit" class="btn btn-outline-success float-end  loginButton" name="add_mission">Start mission</button>
              </div>             
                         
              <div class="form-group my-3">      
                  <a href="<?= $router->generate('add')?>" class="btn btn-outline-success float-end loginButton ">Add agent / contact/ target</a>
              </div> 
              <div class="form-group my-3">   
                  <button type="submit" class="btn btn-outline-danger float-end  loginButton" name="">Cancel</button>
              </div>
          </div>
        </div>
         
        </section>
    </form>    
</div>