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

    # Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong><br>
            El email electrónico no es válido.
        </div>';
        exit();
    }

    # Verificar si el email ya existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE usuario_email = :email");
    $stmt->execute([':email' => $email]);
    $existe_email = $stmt->fetchColumn();

    if ($existe_email > 0) {
        echo '<div class="alert alert-danger" role="alert">
                <strong>¡Error!</strong><br>
                El email ya está registrado.
            </div>';
        exit();
    }



    # Verificar si el usuario ya existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE usuario_usuario = :usuario");
    $stmt->execute([':usuario' => $usuario]);
    $existe_usuario = $stmt->fetchColumn();

    if ($existe_usuario > 0) {
        echo '<div class="alert alert-danger" role="alert">
                <strong>¡Error!</strong><br>
                El USUARIO ya está registrado.
            </div>';
        exit();
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

    # Hashear contraseña antes de guardar
    $clave_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO usuario (usuario_nombre, usuario_apellido, usuario_usuario, usuario_email, usuario_clave) 
                            VALUES (:nombre, :apellidos, :usuario, :email, :clave)");
        $stmt->execute([
            ':nombre'    => $nombre,
            ':apellidos' => $apellidos,
            ':usuario'   => $usuario,
            ':email'     => $email,
            ':clave'     => $clave_hash
        ]);

        echo '<div class="alert alert-success" role="alert">
                <strong>¡Éxito!</strong><br>
                Usuario registrado correctamente.
            </div>';

    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">
                <strong>¡Error en BD!</strong><br>' . $e->getMessage() . '
            </div>';
    }

    $pdo = null;

    
