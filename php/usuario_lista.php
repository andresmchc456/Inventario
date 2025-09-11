<?php
require_once "./php/main.php";

class UsuarioLista {

    public static function listarUsuarios($pagina, $registros, $url, $busqueda) {// $busqueda no se usa actualmente
        $pagina = (int)$pagina;
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

        // Conexión
        $conexion = conexion();

        // Consulta
        $consulta_datos = "SELECT * FROM usuario ORDER BY usuario_id ASC LIMIT $inicio, $registros";
        $consulta_total = "SELECT COUNT(usuario_id) FROM usuario";

        $datos = $conexion->query($consulta_datos);
        $datos = $datos->fetchAll();

        $total = $conexion->query($consulta_total);
        $total = (int) $total->fetchColumn();

        $Npaginas = ceil($total / $registros);

        /* Tabla */
        $tabla = '
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr class="text-center" >
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
					<td>' . $contador . '</td>
					<td>' . $rows['usuario_nombre'] . '</td>
					<td>' . $rows['usuario_usuario'] . '</td>
					<td>' . $rows['usuario_email'] . '</td>
					<td>
						<div class="d-flex justify-content-center gap-5">
							<a href="index.php?vista=user_update&user_id_up=' . $rows['usuario_id'] . '" 
							class=" btn btn-sm btn-custom-blue">
								<i class="bi bi-pencil-square"></i> Actualizar
							</a>
						
							<a href="' . $url . $pagina . '&user_id_del=' . $rows['usuario_id'] . '" 
							 class="btn btn-sm btn-custom-red">
								<i class="bi bi-trash"></i> Eliminar
							</a>
						</div>
					</td>	
				</tr>
                ';
                $contador++;
            }
        } else {
            $tabla .= '
            <tr>
                <td colspan="5" class="text-center">No hay registros en el sistema</td>
            </tr>
            ';
        }

        $tabla .= '
                </tbody>
            </table>
        </div>
        ';

        echo $tabla;
        $conexion = null;
    }
}

// Ejecutar listado
UsuarioLista::listarUsuarios($pagina, $registros, $url, $busqueda);
?>
