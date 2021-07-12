<?php 
session_start();
$pageTitle = "Reigster page";
$pageDesc = "Inscrivez vous! Pour chnager le monde, creer des missions, espionner votre voisin ... "; ?>
<h1>Envi de changer le monde? Tout commence ici </h1>

<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-6">
    <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>
<div class="card">
<div class="card-header">
<h4>Register Page
    <a href="<?= $router->generate('home')?>" class="btn btn-danger float-end">Back</a>

</h4>
</div>


<div class="card-body">
<form action="signin" method="POST">
<div class="form-group mb-3">
<label for="">Full name</label>
<input type="text" name="fullname" class="form-control">
</div>

<div class="form-group mb-3">
<label for="">Password</label>
<input type="password" name="password" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Email</label>
<input type="email" name="email" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Phone Number</label>
<input type="number" name="phone" class="form-control">
</div>

<div class="form-group mb-3">
<button type="submit" name="register" class="btn btn-primary">Sing In</button>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
