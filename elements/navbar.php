<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <h2 class="navbar-brand mx-5" href="#">SPYFIELD</h2>

  <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('mission') ?>">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('mission')?>">Mission</a>
          <?php if(!isset($_SESSION[ 'verified_user_id'])) : ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('login') ?>">Login</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('registerPage') ?>">Register</a>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('admin')?>">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('loggout') ?>">Logout</a>
        </li>
        <?php endif ; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('contact')?>">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

