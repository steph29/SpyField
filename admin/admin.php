<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<h1>Hy <?= $_SESSION['login'] ?></h1>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>
              <div>
            
                 <a href="<?= $router->generate('add')?>" class="btn btn-primary float-end my-4">Add Mission</a>
</div>
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Agent</th>
                              <th>Mission Type</th>
                              <th>Target</th>
                              <th>Country</th>
                              <th>Update </th>
                              <th>Delete</th>

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
                                        <td> <a href="/create?id=<?= $key ;?>" class="btn btn-primary btn-sm">Edit</a></td>
                                        <!-- <td><a href="/delete?id=<?= $key; ?>" class="btn btn-danger btn-sm">Delete</a></td> -->
                                        <td>
                                            <form action="<?= $router->generate('delete')?>" method="post">
                                                <button type="submit" name="delete" value="<?= $key?>" class="btn btn-danger btn-sm align-top my-0">Delete</button>
                                            </form>
                                        </td>
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
</div>