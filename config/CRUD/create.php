
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4>update Mission
</h4>
<a href="<?= $router->generate('mission')?>" class="btn btn-outline-danger float-end">Back</a>
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

<div class="form-group mb-3">
<label for="">Agent</label>
<input type="text" name="agent" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Type of mission</label>
<input type="text" name="missiontype" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Target</label>
<input type="text" name="target" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Country</label>
<input type="text" name="country" class="form-control">
</div>

<div class="form-group mb-3">
<button type="submit" name="update_contact" class="btn btn-outline-success">Update contact</button>
</div>
</form>
<?php
    }else{
        $_SESSION['status'] = "Invalid id" ;
        header('Loaction: mission');
        exit();
    }
}else {
    
    $_SESSION['status'] = "Not found" ;
    header('Loaction: mission');
    exit();
}

?>
</div>
</div>

</div>
</div>
</div>
