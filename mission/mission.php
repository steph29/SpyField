<?php 
session_start();
$pageTitle = "Mission dasboard";
$pageDesc = "Retrouvez ici toutes les informations sur vos missions"; ?>
<h1 class="text-center">Mission dashboard!</h1>

<?php include('../elements/status.php') ;?>

<div class="container">
    <div class="row">
        <div class="col-md-4" >
            <section id="missionSection">
                <h3 class="text-center ">Select your mission</h3>
                <div class="justify-content-center d-flex my-5">
                        <select name="missionType" class="text-center" id="missionType">
                                <option>Select Your mission </option>
                                <?php include("../config/dbconfig.php");
                                    $ref_table = 'missions/';
                                    $fetchData = $database->getReference($ref_table)->getValue();
                                    if ($fetchData > 0) {
                                        $i = 0;
                                        foreach ($fetchData as $key => $row) {
                                            ?>
                                    <option value= "<?= $key; ?>"> <?= $row['mission'] ; ?> </option>
    
                            <?php
                                }
                            }
                            ?>
                        </select>
                </div>
                
            </section>
        </div>
        <div class="col-md-4">
            <section id="missionSection">
                <h3 class="text-center">View where the mission is</h3>
                <div id="viewDiv"></div>
             </section>
        </div>
        
        <div class="col-md-4">
            <section id="missionSection">
                <div class="card-body">
                    <!-- Tableau récap de la mission -->
                    <div class="res"></div>
                </div>
            </div>
         </div>  
        </section>
        </div>
        
    </div>
</div>
<script src="ajax.js"></script>
<script src="script.js"></script>


