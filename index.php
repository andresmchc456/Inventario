<?php require "./inc/sessionStart.php" ; ?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./inc/head.php";?> <!-- ruta elemento -->
</head>
<body>

    <?php
        //vista por defecto
        if (!isset($_GET['vista']) || $_GET['vista'] == "") {
            $_GET['vista'] = "login";
        }

        // Ruta del archivo a cargar
        $vista = basename($_GET['vista']); // seguridad básica
        $rutaVista = "./views/" . $vista . ".php";

        /// Incluir navbar solo si no es login ni 404
        if ($_GET['vista'] != "login" && $_GET['vista'] != "404") {
            include "./inc/navbar.php"; // ruta elemento
        }

        // Mostrar contenido
        if (is_file($rutaVista) && $vista != "404") {
            include $rutaVista;
        } else {
            include "./views/404.php";
        }

    ?>
  
    <?php include "./views/pagination.php";?> <!-- paginador -->
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


<!-- lo utilizamos para navehgar entre las diferentes vistas de la aplicación.
se ultilza en el navegador url  se llama Parámetro de consulta o Query String-->
<!-- http://localhost:8000/?vista= -->
<!-- http://localhost:8000/?vista=login -->
 <!-- http://localhost:8000/?vista=index -->

<!-- comado para correr el servidor local
php -S localhost:8000 -->
