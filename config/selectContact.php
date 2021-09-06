<?php 
session_start();
include('dbconfig.php');

if (isset($_POST['contact'])) {
    $ref_table = 'contact/';
    $getData = $database->getReference($ref_table)->getValue();

    if ($getData > 0) {
        $i = 0;
        foreach ($getData as $key => $row) {
            ?>
      <option name="<?= $row['callsign'] ; ?>" class= "form-control text-center"> <?= $row['callsign'] ; ?> </option>
    <?php
        }
    }
exit(); 
}
?>


