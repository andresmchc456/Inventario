<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <div class="container-fluid">
    <!-- Título o logo -->
     <a class="navbar-brand" href="index.php?vista=home"> <!-- href=esta la rura de la página de inicio -->
      <i class="bi bi-house-fill me-2"></i>Inventario
    </a>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenido que se colapsa -->
    <div class="collapse navbar-collapse" id="navbarContenido">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-underline">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?vista=user_new">Nuevo</a></li> <!-- hace la el enlace con la vista de nuevo usuario en la carpeta views -->
            <li><a class="dropdown-item" href="index.php?vista=user_list">Lista</a></li>
            <li><a class="dropdown-item" href="index.php?vista=search">Buscar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Categoría
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Opción 1</a></li>
            <li><a class="dropdown-item" href="#">Opción 2</a></li>
            <li><a class="dropdown-item disabled" href="#">Opción deshabilitada</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Producto
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Opción 1</a></li>
            <li><a class="dropdown-item" href="#">Opción 2</a></li>
            <li><a class="dropdown-item disabled" href="#">Opción deshabilitada</a></li>
          </ul>
        </li>

      </ul>

      <!-- Sección derecha -->
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto nav nav-underline">
        <li class="nav-item">
          <a class="nav-link" href="#">Mi cuenta</a>
        </li>
        <li class="nav-item">
          <a href="index.php?vista=logout" class="nav-link" href="#">Salir</a> <!-- hace la el enlace con la vista de logout en la carpeta views -->
        </li>
      </ul>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
