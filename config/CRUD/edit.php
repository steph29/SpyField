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

    $ref = 'missions/';
    $getData = $database->getReference($ref)->getChild($key_child)->getValue();

    if($getData > 0) {
        ?>
 
<!-- First section -> create a mission -->

<div class="container mt-3">
    <form action="<?= $router->generate('update')?>" method="post">
        <section class="container">
            <h3 class="text-center mt-3">Update the mission "<?= $getData['mission']?> "</h3>
        <div class="row">
            <!-- first col -->
            <div class="col">
                <input type="hidden" name= "id" value="<?= $key_child ?>">
        <div class="form-group my-3">
          <label class="col-form-label">Mission Title</label>
          <input type="text" class="form-control" name="mission" value="<?= $getData['mission']?>"/>
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
            <input type="text" class="form-control" name="codeName" value="<?= $getData['codeName']?>"/>
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
    <textarea type="text" cols="10" rows="5" name="desc" value="<?= $getData['desc']?>"></textarea>
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
      <option name="<?= $row['name'] ; ?>" > <?= $row['name'] ; ?> </option>

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

</section>
            <div class="form-group mb-3">
            <button type="submit" name="update_mission" class="btn btn-outline-success my-3">Update mission</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/admin.js"></script>
