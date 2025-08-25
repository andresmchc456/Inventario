

<!-- <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination"> //esta parte de la etiqueta  se pego en la funcion  function paginador_tablas en el archivo main -->
  <!-- <ul class="pagination"> -->
    <!-- <li class="page-item"><a class="page-link" href="#">Anterior</a></li> se llevo a la funcion paginador-->
    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>  -->
    <!-- <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
  </ul> -->
<!-- </nav> // aca se cerro el la funcion paginador-->
<div>
    <h1>Home</h1>
    <h2>Bienvenido  <?php echo $_SESSION['nombre']. " ". 
    $_SESSION['apellido'];
    ?></h2>
</div>