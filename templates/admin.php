<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; 
include('../elements/status.php'); 
?>
<div class="row">
    <div class="col col-6"> 
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
                                            <td> <a href="/edit?id=<?= $key ;?>" class="btn btn-outline-success btn-sm ">
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


<div class="col col-6">
    <section class="container d-flex justify-content-center">
        <table class="">
            <thead>
                <th class="col-md-8">Agent </th>
                <th class="col-auto"> edit</th>
                <th class="col-auto">Delete</th>
            </thead>
            <tbody>
                <?= 
                            include("../config/dbconfig.php");

                            $ref_table = 'agent/';
                            $fetchDataAgent = $database->getReference($ref_table)->getValue();

                            if($fetchDataAgent > 0){
                                $i = 0;
                                
                                foreach ($fetchDataAgent as $key => $row) {
                                    ?>
                                        <tr>
                                            <td> <?= $row['callsign'] ;?></td>
                                            <?php 
                                            if(isset($_SESSION[ 'verified_user_id'])): 
                                            ?>
                                            <!-- faire un bouton update -->
                                            <td> <a href="/updateAgent?id=<?= $key ;?>" class="btn btn-outline-success btn-sm " name="update_agent">
                                            <img src="/assets/write.png" alt="">
                                        </a></td>
                                            <td>
                                                <form action="<?= $router->generate('delete')?>" method="post">
                                                    <input type="hidden" value="<?= $key?>" name="id_delete_agent">
                                                    <button type="submit" name="delete_contact"  class="btn btn-outline-danger btn-sm my-0">
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
          <label class="col-form-label">Country</label>
                <select name="country" id="country" class="form-control text-center linked-select">
        <option >Select the country</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'countries/';
    $fetchDataCountry = $database->getReference($ref_table)->getValue();

    if ($fetchDataCountry > 0) {
        $i = 0;
        foreach ($fetchDataCountry as $key => $row) {
            ?>
      <option name="<?= $row['name'] ; ?>"  value="<?= $key; ?>"> <?= $row['name'] ; ?> </option>

      <?php
        }
    }
     ?>
                </select>
    </div>
        <div class="form-group my-3">
            <label class="col-form-label">Code Name</label>
            <input type="text" class="form-control" name="codeName"/>
        </div>
         <div class="form-group my-3">
            <label class="col-form-label">Target </label>
   <select name="target[]" id="target" class="form-control text-center linked-select">
        <option >Select your Target</option>
     <?php $ref_table = "target/";
    $fetchData = $database->getReference($ref_table)->getValue();
    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $key ; ?>"  value="<?= $key ;?>" > <?= $row["callsign"] ; ?> </option>

      <?php
        }
    };
    ?>
    </select>
    <div class="newSelectTarget"></div>
<div >
    <a class="btn rounded-circle btn-outline-success d-flex circle float-end" id="addSelectTarget" >+</a>
</div>
        </div>
<div class="form-group my-3">
            <label class="col-form-label">Specialities </label>
           <select name="specialities" class="form-control text-center linked-select" id="specialities">
               <option >Select your Specialities</option>
       <?php include("../config/dbconfig.php");
    $ref_table = 'specialities/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['name'] ; ?>" value="<?= $key ;?>"> <?= $row['name'] ; ?> </option>

      <?php
        }
    }
     ?>
     </select>
        </div>
        <div class="form-group my-3">
        <div class="alertAgent col-md-12 justify-content-center align-items-center d-flex" id="alertAgent"></div>
        <label class="col-form-label">Agent </label>
        <select name="agent[]" id="agent" class="form-control text-center linked-select">
        <option >Select your Agent</option>
    </select>
    <div class="newSelectAgent"></div>
<div >
    <a class="btn rounded-circle btn-outline-success d-flex circle float-end" id="addSelectAgent" >+</a>
</div>
        </div>
       
    <div class="form-group my-3">
          <label class="col-form-label">Description </label>
    <textarea type="text" cols="10" rows="5" name="desc"></textarea>
        </div>
    
</div> 
<!-- end of first col -->
<!-- second col -->
        <div class="col">
               <div class="col form-group my-3 ">
                <div class="alertContact col-md-12 justify-content-center align-items-center d-flex" id="alertContact"></div>
                <label class="col-form-label">Contact</label>
                <select name="contact[]" id="contact" class="form-control text-center linked-select" >
        <option >Select your contact</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'contact/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $key ; ?>" value="<?= $key ?>"> <?= $row['callsign'] ; ?> </option>
            
      <?php
      
    }
}
?>
</select>
<div class="newSelectContact"></div>
<div >
    <a class="btn rounded-circle btn-outline-success d-flex circle float-end" id="addSelectContact" >+</a>
</div>

            </div>
        
        <div class="form-group my-3">
          <label class="col-form-label">Type of mission </label>
          <select name="type" class="form-control text-center linked-select" id="type">
        <option >Select your Type of mission</option>
         
          <?php include("../config/dbconfig.php");
    $ref_table = 'types/';
    $fetchData = $database->getReference($ref_table)->getValue();

    if ($fetchData > 0) {
        $i = 0;
        foreach ($fetchData as $key => $row) {
            ?>
      <option name="<?= $row['name'] ; ?>" value="<?= $key ?>"> <?= $row['name'] ; ?> </option>
            
      <?php
      
    }
}
?>
</select>
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
            <select name="hideouts[]" class="form-control text-center linked-select" id="hideouts">
        <option >Select your hideouts</option>
     </select>
     <div class="newSelectHideouts"></div>
<div >
    <a class="btn rounded-circle btn-outline-success d-flex circle float-end" id="addSelectHideouts" >+</a>
</div>
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
