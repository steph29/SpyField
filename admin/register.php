<?php 
session_start();
$pageTitle = "Reigster page";
$pageDesc = "Inscrivez vous! Pour chnager le monde, creer des missions, espionner votre voisin ... "; ?>
<h1 class="text-center my-5">Want to change the world ?  you are in the place </h1>

<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-6 ">
    <div class="col-md-12 justify-content-center align-items-center d-flex">
          <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?> 
    </div>
 <section>

<div class="card-header">
<h4>Sign In
    

</h4>
</div>


<div class="card-body">
<form action="signin" method="POST">
<div class="form-group mb-3">
<label for="" class="col-form-label">Full name</label>
<input type="text" name="fullname" class="form-control" placeholder="Jean Bond">
</div>
<div class="form-group mb-3">
<label for="" class="col-form-label">Password</label>
<input type="password" name="password" class="form-control">
</div>
<div class="form-group mb-3">
<label for="" class="col-form-label">Email</label>
<input type="email" name="email" class="form-control" placeholder="jean.bond@secret.com">
</div>
<div class="form-group mb-3">
<label for="" class="col-form-label">Phone Number</label>
<input type="number" name="phone" class="form-control" placeholder="123456789">
</div>

<div class="row">
    <div class="col">
        <div class="form-group mb-3">

<button type="submit" name="register" class="btn btn-outline-success loginButton">Sing In</button>
</div>
    </div>
    <div class="col">
        <div class="form-group mb-3">

<button type="submit" name="cancel" class="btn btn-outline-danger loginButton ">Back</button>
</div>
    </div>
</div>



<div></div>
</form>
</div>
</div>

</div>
</div>


 </section>
