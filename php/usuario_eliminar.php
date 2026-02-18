<?php
    $user_id_del = limpiar_cadena($_GET['user_id_del']);

    // Verificar que el usuario exista
    $check_usuario = conexion();
    $check_usuario=$check_usuario->query("SELECT usuario_id FROM usuario WHERE usuario_id='$user_id_del'");
    if($check_usuario-> rowCount() == 1){

        //productos: verificar si existen productos asociados al usuario
        $check_productos = conexion();
        $check_productos=$check_productos->query("SELECT producto_id FROM producto WHERE usuario_id='$user_id_del' LIMIT 1");

        if($check_productos-> rowCount() <=0){

            $eliminar_usuario = conexion();
            $eliminar_usuario=$eliminar_usuario->prepare("DELETE FROM usuario WHERE usuario_id=:id");

            $eliminar_usuario->execute([":id"=>$user_id_del]);

            if($eliminar_usuario->rowCount() == 1){
                echo '<div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">¡Usuario eliminado!</h4>
                        <p class="mb-0">El usuario ha sido eliminado exitosamente.</p>
                      </div>';
                // exit();

            }else{
                echo '<div class="alert alert-danger text-center" role="alert">
                        <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
                        <p class="mb-0">No se pudo eliminar el usuario, por favor intenta nuevamente.</p>
                      </div>';
                // exit();
            }
            $eliminar_usuario=null;

        }else{
            echo '<div class="alert alert-danger text-center" role="alert">
                    <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
                    <p class="mb-0">No se puede eliminar el usuario porque tiene productos asociados.</p>
                  </div>';
            // exit();

        }
        $check_productos=null;

    }else{
        echo '<div class="alert alert-danger text-center" role="alert">
                <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
                <p class="mb-0">El usuario que intenta eliminar no existe.</p>
              </div>';
        // exit();
    }
    $check_usuario=null;

