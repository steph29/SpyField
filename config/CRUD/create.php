<?php 
session_start();

?>
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<div class="card-header">
<h4>update Mission
</h4>
<a href="<?= $router->generate('admin')?>" class="btn btn-outline-danger float-end">Back</a>
</div>


<div class="card-body">

<?php 
include("../config/dbconfig.php");

if(isset($_GET['id'])){
    $key_child = $_GET['id'];

    $ref_table = 'missions/';
    $getData = $database->getReference($ref_table)->getChild($key_child)->getValue();

    if($getData > 0) {
        ?>
        
<form action="<?= $router->generate('update')?>" method="post">
<input type="hidden" name="key" value="<?= $key_child?>">
<div class="container-fluid">
    <div class="row">
        <div class="col my-3">
            <section class="container">
        <h3 class="text-center ">Select the mission</h3>
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
     <?php include("../config/dbconfig.php");
    $ref_table = 'agent/';
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
          <label class="col-form-label">Country </label>
          <input type="text" class="form-control" name="country"/>
        </div>
   
        </section>
</div>

    <div class="col my-3">
        <section class="container ">
            <h3 class="text-center ">Select the mission</h3>
            <div class="form-group my-3">
                <label class="col-form-label">Select the Contact</label>
                <select name="contact" class="form-control text-center linked-select">
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
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Type of mission </label>
          <input type="text" class="form-control" name="type"/>
        </div>
    <div class="form-group my-3">
          <label class="col-form-label">Status </label>
          <input type="text" class="form-control" name="status"/>
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
</section>
            <div class="form-group mb-3">
            <button type="submit" name="update_contact" class="btn btn-outline-success my-3">Update contact</button>
            </div>
        </form>
<?php
    }else{
        $_SESSION['status'] = "Invalid id" ;
        header('Loaction: admin');
        exit();
    }
}else {
    
    $_SESSION['status'] = "Not found" ;
    header('Loaction: admin');
    exit();
}

?>
</div>
</div>

</div>
</div>
</div>
