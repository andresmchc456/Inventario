<?php
    require_once "main.php"; // archivo con limpiar_cadena y verificar_datos

    # Sanitizar datos
    $nombre     = limpiar_cadena($_POST['InputName'] ?? '');
    $apellidos  = limpiar_cadena($_POST['lastName'] ?? '');
    $usuario    = limpiar_cadena($_POST['user'] ?? '');
    $email     = limpiar_cadena($_POST['InputEmail1'] ?? '');
    $password   = limpiar_cadena($_POST['exampleInputPassword1'] ?? '');
    $repitePass = limpiar_cadena($_POST['InputPassword2'] ?? '');

    # Verificar campos obligatorios
    if (
        empty($nombre) ||
        empty($apellidos) ||
        empty($usuario) ||
        empty($email) ||
        empty($password) ||
        empty($repitePass)
    ) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos obligatorios.
        </div>';
        exit();
    }

    # Validar formato de campos
    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            El NOMBRE solo puede contener letras y espacios (3 a 40 caracteres).
        </div>';
        exit();
    }

    if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellidos)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            Los APELLIDOS solo pueden contener letras y espacios (3 a 40 caracteres).
        </div>';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            El USUARIO debe tener entre 4 y 20 caracteres sin espacios.
        </div>';
        exit();
    }

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo '
    //     <div class="alert alert-danger" role="alert">
    //         <strong>¡Error!</strong><br>
    //         El email electrónico no es válido.
    //     </div>';
    //     exit();
    // }

    if($email!=""){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $check_email = conexion();
            $check_email = $check_email -> query("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");// Verificar si el email ya existe
            if($check_email -> rowCount()>0){
                echo '
                <div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong><br>
                    El email ya está registrado.
                </div>';
                exit();
            }
            $check_email = null; // Cerrar conexión
        }else{
            echo '
            <div class="alert alert-danger" role="alert">
                <strong>¡Error!</strong><br>
                El email electrónico no es válido.
            </div>';
            exit();
        }
    }

    # Validar contraseñas
    if ($password !== $repitePass) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            Las contraseñas no coinciden.
        </div>';
        exit();
    }

    if (strlen($password) < 6 || strlen($password) > 20) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            La contraseña debe tener entre 6 y 20 caracteres.
        </div>';
        exit();
    }

    

    # Si todo está bien, insertar en BD (ejemplo)
    echo '
    <div class="alert alert-success" role="alert">
        Usuario registrado correctamente.
    </div>';

    
?>
