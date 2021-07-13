<?php 
session_start();
$pageTitle = "Mission dasboard";
$pageDesc = "Retrouvez ici toutes les informations sur vos missions"; ?>
<h1 class="text-center">Mission dashboard!</h1>



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
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Agent</th>
                              <th>Mission Type</th>
                              <th>Target</th>
                              <th>Country</th>
                              <?php 
                              if(isset($_SESSION[ 'verified_user_id'])): ?>
                        <th>Edit</th>
                        <th>Delete</th>
                                  <?php
                                  endif;
                              ?>
                          </tr>
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
                                        <td> <?= $row['agent'] ;?></td>
                                        <td> <?= $row['missiontype'] ;?></td>
                                        <td> <?= $row['target'] ;?></td>
                                        <td> <?= $row['country'] ;?></td>
                                        <?php 
                                        if(isset($_SESSION[ 'verified_user_id'])): 
                                        ?>
                                        <td> <a href="/create?id=<?= $key ;?>" class="btn btn-outline-success btn-sm">Edit</a></td>
                                        <td>
                                            <form action="<?= $router->generate('delete')?>" method="post">
                                                <button type="submit" name="delete" value="<?= $key?>" class="btn btn-outline-danger btn-sm my-0">Delete</button>
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
              </div>
        </div>
    </div>