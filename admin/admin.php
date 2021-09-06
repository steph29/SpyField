<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; 
include('../elements/status.php'); 
?>

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
     <?php $ref_table = "agent/";
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['callsign'] ; ?>" > <?= $row["callsign"] ; ?> </option>

      <?php
        }
    };?>
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
          <label class="col-form-label">Country</label>
                <select name="country" class="form-control text-center linked-select">
        <option >Select the country</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'countries/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['name'] ; ?>" > <?= $row['name'] ; ?> </option>

      <?php
        }
    }
     ?>
                </select>
    </div>
</div> 
<!-- end of first col -->
<!-- second col -->
        <div class="col">
               <div class="col form-group my-3 ">
        <!-- Faire une boucle "tant que value == Select your contact" -> laisser, sinon faire apparaite un nouveau select -->

                <label class="col-form-label">Contact</label>
                <select name="contact" class="form-control text-center linked-select" id="contact">
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
<div >
    <a class="btn rounded-circle btn-outline-success d-flex circle float-end" id="addSelect" >+</a>
</div>

            </div>
        
        <div class="form-group my-3">
          <label class="col-form-label">Type of mission </label>
          <input type="text" class="form-control" name="type"/>
        </div>
        <div class="form-group my-3">
          <label class="col-form-label">Status </label>
          <select name="status" class="form-control text-center linked-select">
        <option >Select the status</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'status/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['state'] ; ?>" > <?= $row['state'] ; ?> </option>

      <?php
        }
    }
     ?>
                </select>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/admin.js"></script>
