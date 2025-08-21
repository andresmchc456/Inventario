<?php
    # almacén de inicio de sesión
    $usuario = limpiar_cadena($_POST['login_usuario']); // sanitiza la entrada
    $clave   = limpiar_cadena($_POST['login_clave']);   // sanitiza la entrada

    # verificamos los campos obligatorios
    if (empty($usuario) || empty($clave)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos obligatorios.
        </div>';
        exit();
    }

    # Validar formato de usuario
    if (verificar_datos("[a-zA-Z0-9@._-]{3,40}", $usuario)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            El USUARIO no coincide con el formato solicitado.
        </div>';
        exit();
    }

    # Validar formato de clave (mínimo 3, máximo 40 caracteres cualquiera)
    if (verificar_datos(".{3,40}", $clave)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            La CLAVE no coincide con el formato solicitado.
        </div>';
        exit();
    }

    # Verificar si el usuario existe
    $check_user = conexion();
    $check_user = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario='$usuario'");

    if ($check_user->rowCount() == 1) { // Verificar si el usuario existe
        $check_user = $check_user->fetch(); // Obtener los datos del usuario

        # Verificar la contraseña
        if (password_verify($clave, $check_user['usuario_clave'])) {
            $_SESSION['id']       = $check_user['usuario_id'];      // Guardar ID del usuario
            $_SESSION['nombre']   = $check_user['usuario_nombre'];
            $_SESSION['apellido'] = $check_user['usuario_apellido'];
            $_SESSION['usuario']  = $check_user['usuario_usuario'];

            if (headers_sent()) {
                echo "<script> window.location.href='index.php?vista=home';</script>"; // Redirigir al home
            } else {
                header("Location: index.php?vista=home");
            }

        } else {
            echo '
            <div class="alert alert-danger" role="alert">
                <strong>¡Error!</strong><br>
                El USUARIO o la CLAVE son incorrectos.
            </div>';
        }
    } else {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            El USUARIO no existe.
        </div>';
    }

    $check_user = null; // Liberar la variable
?>
