<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <h2 class="navbar-brand mx-5" href="#">SPYFIELD</h2>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('home') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mission/Mon-voyage-79">Mission</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('login') ?>">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('registerPage') ?>">Register</a>
        </li>
        <!-- Rendre le bouton visible si la personne est connectée -->
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('admin')?>">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('contact')?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('loggout') ?>">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>