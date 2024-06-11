
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand">Loja de Carro</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Catalogo.php">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Carrinho.php">Carrinho</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['usuario']->getName(); ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Sair.php">Sair</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>