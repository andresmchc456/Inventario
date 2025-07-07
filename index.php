<?php require "./inc/sessionStart.php" ; ?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./inc/head.php";?> <!--ruta  elemento-->
</head>
<body>
    
    <?php
         include "./inc/navbar.php";

         if(!isset($_GET['vista']) || $_GET['vista'] == ""){
            $_GET['vista']="login";
         }
         if(is_file("./views/".$_GET['vista'].".php") && $_GET['vista'] != "login" && $_GET['vista'] !="404"){
            // include "./inc/navbar.php";
            include "./views/".$_GET['vista'].".php"; //ruta  elemento
         }else{
            if($_GET['vista'] == "login"){
                include "./views/login.php"; //ruta  elemento

            }else{
                include "./views/404.php";
            }
           
         }
        

        ?> <!--ruta  elemento-->

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<!-- si hay problemas mira el video CURSO de PHP y MySQL desde CERO - 08 ARCHIVO PRINCIPAL del SISTEMA de INVENTARIO en PHP y MySQL -->