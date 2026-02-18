<div class="container-fluid mb-4">
    <h1 class="h3">Usuarios</h1>
    <h2 class="h6 text-muted">Buscar usuario</h2>
</div>

<div class="container py-4">
<?php
    require_once __DIR__ . "/../php/main.php";

    // Procesar búsqueda
    if (isset($_POST['modulo_buscador'])) {
        require_once __DIR__ . "/buscador.php";
    }

    // SI NO hay búsqueda activa
    if (!isset($_SESSION['busqueda_usuario']) || empty($_SESSION['busqueda_usuario'])) {
?>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="usuario">

                <div class="input-group">
                    <input 
                        type="text"
                        name="txt_buscador"
                        class="form-control"
                        placeholder="¿Qué estás buscando?"
                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}"
                        maxlength="30"
                        required
                    >
                    <button class="btn btn-info" type="submit">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php } else { ?>

    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="usuario">
                <input type="hidden" name="eliminar_buscador" value="usuario">

                <p class="mb-2">
                    Estás buscando 
                    <strong>“<?php echo $_SESSION['busqueda_usuario']; ?>”</strong>
                </p>

                <button type="submit" class="btn btn-danger btn-sm">
                    Eliminar búsqueda
                </button>
            </form>
        </div>
    </div>

<?php

        # Eliminar usuario #
        if(isset($_GET['user_id_del'])){
            require_once "./php/usuario_eliminar.php";//
        }
        
        // Paginación
        if (!isset($_GET['page'])) {
            $pagina = 1;
        } else {
            $pagina = (int) $_GET['page'];
            if ($pagina <= 1) {
                $pagina = 1;
            }
        }

        $pagina = limpiar_cadena($pagina);
        $registros = 15;
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $url = "index.php?vista=search&page=";
        $busqueda = $_SESSION['busqueda_usuario'];

        // Listado filtrado
        require_once __DIR__ . "/../php/usuario_lista.php";
    }
?>
</div>