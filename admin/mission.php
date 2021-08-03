<?php 
session_start();
$pageTitle = "Mission dasboard";
$pageDesc = "Retrouvez ici toutes les informations sur vos missions"; ?>


<?php include('../elements/status.php') ;?>

<div class="container">
    <div class="row">
        <div class="my-1" >
                <h3 class="text-center ">Select your mission</h3>
                <div class=" my-3">
                        <select class="justify-content-center d-flex text-center linked-select form-control" id="missionType">
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
        </div>
        <div class="col-md-6 my-3">
            <section class="missionSection">
                <!-- Visualisation de la carte -->
                 <div id="mapid"></div>
             </section>
        </div>
        
        <div class="col-md-6 my-3">
            <section class="missionSection">
                <div class="card-body">
                    <!-- Tableau récap de la mission -->
                    <div class="res"></div>
                </div>
        </section>
</div>
                        </div>
                        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/script.js"></script>


