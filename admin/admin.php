<?php 
session_start();
$pageTitle = "Admin dasboard";
$pageDesc = "Ajouter, supprimer, modiifer, faites plaisir! C'est ici!"; ?>
<h1>Bienvenu sur la partie Admin</h1>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>

              <div class="card-header">
                  <h4>What new's today?</h4>
              </div>
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>S1.no</th>
                              <th>name</th>
                              <th>password</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?= 
                          include("../config/dbconfig.php");

                          $ref_table = 'users/';
                          $fetchData = $database->getReference($ref_table)->getValue();

                          if($fetchData > 0){
                              $i = 0;
                             
                            foreach ($fetchData as $key => $row) {
                                ?>
                                    <tr>
                                        <td> <?= $key; ?></td>
                                        <td> <?= $row['login'] ;?></td>
                                        <td> <?= $row['password'] ;?></td>
                                        <td> <a href="/create?id=<?= $key ;?>" class="btn btn-primary btn-sm">Edit</a></td>
                                        <!-- <td> <a href="/delete" class="btn btn-danger btn-sm">Delete</a></td> -->
                                        <td>
                                            <form action="<?= $router->generate('delete')?>" method="post">
                                                <button type="submit" name="delete" value="<?= $key?>" class="btn btn-danger btn-sm">Delete</button>
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