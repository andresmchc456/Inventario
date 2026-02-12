<div class="container-fluid mb-4">
    <h1 class="h3">Productos</h1>
    <h2 class="h6 text-muted">Buscar producto</h2>
</div>

<div class="container py-4">
<?php
    require_once "./php/main.php";

    if(isset($_POST['modulo_buscador'])){// Verificar que se ha enviado el formulario de búsqueda
        require_once "./php/buscador.php";
    }

    if(!isset($_SESSION['busqueda_usuario']) && empty($_SESSION['busqueda_usuario'])){
    // if(!isset($_SESSION['busqueda_producto']) && empty($_SESSION['busqueda_producto'])){    
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
                    >
                    <button class="btn btn-info" type="submit">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php }else{ ?>

    <div class="row justify-content-center">
        <div class="col-md-8 text-center my-5">
            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="producto">
                <input type="hidden" name="eliminar_buscador" value="producto">

                <p class="mb-3">
                    Estás buscando <strong>“<?php echo $_SESSION['busqueda_usuario']; ?>”</strong>
                </p>

                <button type="submit" class="btn btn-danger">
                    Eliminar búsqueda
                </button>
            </form>
        </div>
    </div>

<?php
        # Eliminar producto #
        if(isset($_GET['product_id_del'])){
            require_once "./php/producto_eliminar.php";
        }

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $categoria_id = (isset($_GET['category_id'])) ? $_GET['category_id'] : 0;// Obtener categoría seleccionada

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=product_search&page=";// URL base para paginación
        $registros=15;
        $busqueda=$_SESSION['busqueda_producto'];

        # Paginador producto #
        require_once "./php/producto_lista.php";
    }
?>
</div>
