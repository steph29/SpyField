<?php
session_start();
include('../config/dbconfig.php') ;

if(isset($_POST['update_agent'])){

$key = $_POST['key'];
$lname = $_POST['lastname'];
$fname = $_POST['firstname'];
$birthday = $_POST['birthday'];
$callsign = $_POST['callsign'];
$nationalityId = $_POST['nationality'];
$specialities = $_POST['speciality'];

$arraySpecialities = [$specialities ];

$agentData = [
    'lname' => $lname,
    'fname' => $fname,
    'birthday' => $birthday,
    'callsign' => $callsign,
    'nationalityId' => $nationalityId,
    'specialities' => $arraySpecialities
];
        

$ref_table = 'agent/'.$key;
$updateQuery = $database->getReference($ref_table)->update($postData);

if($updateQuery){
        $_SESSION['status'] = "Agent updated";
        header('Location: admin');
    }else{
         $_SESSION['status'] = "Agent not updated";
        header('Location: admin');
    }
}

?>

<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h4>Update Agent <?= $updateQuery['callsign']?>
</h4>
<a href="<?= $router->generate('admin')?>" class="btn btn-outline-danger float-end">Back</a>
</div>

<div class="card-body">
    <div class="container-fluid">
    <form action="<?= $router->generate('new_element')?>" method="post">
    <div class="row">
         <div class="col my-3">
<section class="container">
    <div class="form-group mb-3">
    <label for="">Select your new entry:</label>
<select name="choice" class="form-control text-center">
<option name="Agent" value="Agent">Agent</option>
<option name="target" value="target">Target</option>
<option name="contact" value="contact">Contact</option>
</select>
</div>
<div class="form-group mb-3">
<label for="">Last name</label>
<input type="text" name="lastname" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">first name</label>
<input type="text" name="firstname" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Birthday</label>
<input type="date" name="birthday" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">callsign</label>
<input type="text" name="callsign" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Nationality</label>
<select name="nationality" id="nationality" class="form-control text-center linked-select">
        <option >Select the country</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'countries/';
    $fetchDataCountry = $database->getReference($ref_table)->getValue();

    if ($fetchDataCountry > 0) {
        $i = 0;
        foreach ($fetchDataCountry as $key => $row) {
            ?>
      <option name="<?= $key ; ?>"  value="<?= $key; ?>"> <?= $row['name'] ; ?> </option>

      <?php
        }
    }
     ?>
                </select>
</div>
<div class="form-group mb-3">
<label for="">Speciality</label>
<select name="speciality" id="speciality" class="form-control text-center linked-select">
        <option >Select the Specialities</option>
     <?php include("../config/dbconfig.php");
    $ref_table = 'specialities/';
    $fetchDataSpecialities  = $database->getReference($ref_table)->getValue();

    if ($fetchDataSpecialities  > 0) {
        $i = 0;
        foreach ($fetchDataSpecialities as $key => $row) {
            ?>
      <option name="<?= $key ; ?>"  value="<?= $key; ?>"> <?= $row['name'] ; ?> </option>

      <?php
        }
    }
     ?>
                </select>
</div>
<div class="form-group mb-3">
<button type="submit" name="add_agent" class="btn btn-outline-success">Add </button>
</div>
</section>

</form> 
    </div>
</div>

    </div>

   


</div>
</div>

</div>
</div>
</div>
