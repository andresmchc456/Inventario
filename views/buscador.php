<?php
    $modulo_buscador = limpiar_cadena($_POST['modulo_buscador']); // Limpia el valor recibido del formulario

    $modulos = ["usuario", "categoria", "producto"]; // Define los módulos permitidos para la búsqueda

    if(in_array($modulo_buscador, $modulos)){
        
        // Verificar si se debe eliminar la búsqueda
        if(isset($_POST['eliminar_buscador'])){
            $eliminar = limpiar_cadena($_POST['eliminar_buscador']);
            
            if($eliminar == "usuario"){
                unset($_SESSION['busqueda_usuario']);
            } elseif($eliminar == "categoria"){
                unset($_SESSION['busqueda_categoria']);
            } elseif($eliminar == "producto"){
                unset($_SESSION['busqueda_producto']);
            }
            
            // Redirigir
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
        
        // Procesar la búsqueda
        if(isset($_POST['txt_buscador'])){
            $buscador = limpiar_cadena($_POST['txt_buscador']);
            
            if($buscador == ""){
                echo '<div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-circle"></i>
                        <strong>¡Error!</strong> Debes escribir algo para buscar
                      </div>';
            } else {
                // Guardar la búsqueda en la sesión
                if($modulo_buscador == "usuario"){
                    $_SESSION['busqueda_usuario'] = $buscador;
                } elseif($modulo_buscador == "categoria"){
                    $_SESSION['busqueda_categoria'] = $buscador;
                } elseif($modulo_buscador == "producto"){
                    $_SESSION['busqueda_producto'] = $buscador;
                }
                
                // Redirigir a la misma página
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        
    } else {
        echo '<div class="alert alert-danger text-center" role="alert">
                <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
                <p class="mb-0">El módulo de búsqueda no es válido.</p>
              </div>';
    }
?>
