<?php 
session_start();
$pageTitle = "Connectez-vous";
$pageDesc = "Le meilleur moyen de rester au jus, c'est de se connecter !" ;?>

<h2 class="text-center">Connected place</h2>
<section class="container-fluid text-center">
<div class="col-md-12">
          <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }
          ?>
</div>


      <form action= "connect" method="POST">
        <div class="form-group my-3">
          <label for="login" class="col-form-label">Email </label>
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="James.Bond"

          />
        </div>

        <div class="form-group">
          <label for="password" class="col-form-label">Password</label>
          <input
            type="password"
            class="form-control"
            name="password"
          />
        </div>
        <button
          type="submit"
          class="btn btn-outline-success m-4"
          name="loginBtn"
        >
          Connexion
        </button>
      </form>
    </section>



