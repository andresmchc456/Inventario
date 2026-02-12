<?php
require_once "./php/main.php";

class UsuarioLista {

    public static function listarUsuarios($pagina, $registros, $url, $busqueda) {
        $pagina = (int)$pagina;
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

        // Conexión
        $conexion = conexion();

        // Consulta - Verificar si hay búsqueda
        if($busqueda != ""){
            // Si hay búsqueda, filtrar por nombre, usuario o email
            $consulta_datos = "SELECT * FROM usuario WHERE 
                               usuario_nombre LIKE '%$busqueda%' OR 
                               usuario_usuario LIKE '%$busqueda%' OR 
                               usuario_email LIKE '%$busqueda%' 
                               ORDER BY usuario_id ASC LIMIT $inicio, $registros";
            $consulta_total = "SELECT COUNT(usuario_id) FROM usuario WHERE 
                              usuario_nombre LIKE '%$busqueda%' OR 
                              usuario_usuario LIKE '%$busqueda%' OR 
                              usuario_email LIKE '%$busqueda%'";
        } else {
            // Si no hay búsqueda, mostrar todos los usuarios
            $consulta_datos = "SELECT * FROM usuario ORDER BY usuario_id ASC LIMIT $inicio, $registros";
            $consulta_total = "SELECT COUNT(usuario_id) FROM usuario";
        }

        $datos = $conexion->query($consulta_datos)->fetchAll();
        $total = (int) $conexion->query($consulta_total)->fetchColumn();

        $Npaginas = ceil($total / $registros);

        /* Tabla */
        $tabla = '
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
        ';

        if ($total >= 1 && $pagina <= $Npaginas) {
            $contador = $inicio + 1;
            foreach ($datos as $rows) {
                $tabla .= '
                <tr>
                    <td>'.$contador.'</td>
                    <td>'.$rows['usuario_nombre'].'</td>
                    <td>'.$rows['usuario_usuario'].'</td>
                    <td>'.$rows['usuario_email'].'</td>
                    <td>
                        <div class="d-flex justify-content-center gap-5">
                            <a href="index.php?vista=user_update&user_id_up='.$rows['usuario_id'].'" 
                               class="btn btn-sm btn-custom-blue">
                                <i class="bi bi-pencil-square"></i> Actualizar
                            </a>
                            <a href="'.$url.$pagina.'&user_id_del='.$rows['usuario_id'].'" 
                               class="btn btn-sm btn-custom-red">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </div>
                    </td>
                </tr>';
                $contador++;
            }

            // Calcular rango mostrado
            $pag_inicio = $inicio + 1;
            $pag_final = $inicio + count($datos);

            $tabla .= '
                </tbody>
            </table>
        </div>
        <p class="text-end mt-2">
            Mostrando usuarios <strong>'.$pag_inicio.'</strong> al 
            <strong>'.$pag_final.'</strong> de un 
            <strong>total de '.$total.'</strong>
        </p>';
        } else {
            $tabla .= '
            <tr>
                <td colspan="5" class="text-center">No hay registros en el sistema</td>
            </tr>
                </tbody>
            </table>
        </div>';
        }

        $conexion = null;
        echo $tabla;

        // 🔹 Llamar paginador
        require_once "./views/pagination.php";
        if ($total >= 1 && $pagina <= $Npaginas) {
            echo paginador_bootstrap($pagina, $Npaginas, $url, "Anterior", "Siguiente");
        }
    }
}

// Ejecutar listado
UsuarioLista::listarUsuarios($pagina, $registros, $url, $busqueda);
