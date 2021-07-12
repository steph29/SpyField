<?php 
session_start();
$pageTitle = "Connectez-vous";
$pageDesc = "Le meilleur moyen de rester au jus, c'est de se connecter !" ;?>

<h2 class="text-center">Connected place</h2>
<section class="container-fluid text-center">


      <form action= "code" method="POST">
        <div class="form-group my-3">
          <label for="login" class="col-form-label">login </label>
          <input
            type="text"
            class="form-control"
            name="login"
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
          name="submit"
        >
          Connexion
        </button>
      </form>
    </section>



