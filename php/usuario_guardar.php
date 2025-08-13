<?php
    // require_once "../php/main.php";
    require_once "main.php";// ruta del archivo main.php

    #almacenar el usuario en la base de datos
    $nombre     = limpiar_cadena($_POST['InputName']);
    $apellidos  = limpiar_cadena($_POST['lastName']);
    $usuario    = limpiar_cadena($_POST['user']);
    $correo     = limpiar_cadena($_POST['InputEmail1']);
    $password   = limpiar_cadena($_POST['exampleInputPassword1']);
    $repitePass = limpiar_cadena($_POST['InputPassword2']);


    #verificar campos obligatorios
   if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_apellido']) || empty($_POST['usuario_usuario']) || empty($_POST['usuario_clave']) || empty($_POST['usuario_email'])){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>
        ';
        exit();
    }

?>