<?php
session_start();
?>


<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h4>Add New Agent
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
<input type="text" name="specialities" class="form-control">
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
