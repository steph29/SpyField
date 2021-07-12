
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4>Create & update Mission
</h4>
<a href="<?= $router->generate('admin')?>" class="btn btn-danger float-end">Back</a>
</div>


<div class="card-body">

<?php 
include("../config/dbconfig.php");

if(isset($_GET['id'])){
    $key_child = $_GET['id'];
    $ref_table = 'users/';
    $getData = $database->getReference($ref_table)->getChild($key_child)->getValue();

    if($getData > 0) {
        ?>
        
        
        
<form action="<?= $router->generate('update')?>" method="post">
<input type="hidden" name="key" value="<?= $key_child?>">

 <div class="form-group my-3">
          <label for="login" class="col-form-label">login </label>
          <input
            type="text"
            class="form-control"
            value= "<?= $getData['login'] ?>"
            name="login"
            placeholder="James.Bond"

          />
        </div>

        <div class="form-group">
          <label for="password" class="col-form-label">Password</label>
          <input
            type="text"
            class="form-control"
            value= "<?= $getData['password'] ?>"
            name="password"
          />
        </div>


<div class="form-group mb-3">
<button type="submit" name="update_contact" class="btn btn-primary">Update contact</button>
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
