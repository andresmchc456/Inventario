<div class="container my-4">
    <h1 class="display-5 fw-bold">Usuarios</h1>
    <p class="lead">Buscar usuario</p>
</div>

<div class="container py-4">
    <?php
        require_once "./php/main.php";

        if(isset($_POST['modulo_buscador'])){
            require_once "./php/buscador.php";
        }

        if(!isset($_SESSION['busqueda_usuario']) && empty($_SESSION['busqueda_usuario'])){
    ?>
    <!-- Formulario de búsqueda -->
    <div class="row">
        <div class="col-12">
            <form action="" method="POST" autocomplete="off" class="row g-3">
                <input type="hidden" name="modulo_buscador" value="usuario">   
                <div class="col-md-8">
                    <input class="form-control" 
                           type="text" 
                           name="txt_buscador" 
                           placeholder="¿Qué estás buscando?" 
                           pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" 
                           maxlength="30">
                </div>
                <div class="col-md-4 d-grid">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php }else{ ?>
    <!-- Cuando hay búsqueda activa -->
    <div class="row">
        <div class="col-12">
            <form class="text-center my-4" action="" method="POST" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="usuario"> 
                <input type="hidden" name="eliminar_buscador" value="usuario">
                <p class="mb-3">
                    Estás buscando: 
                    <strong class="text-primary">“<?php echo $_SESSION['busqueda_usuario']; ?>”</strong>
                </p>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-x-circle"></i> Eliminar búsqueda
                </button>
            </form>
        </div>
    </div>
    <?php
            # Eliminar usuario #
            if(isset($_GET['user_id_del'])){
                require_once "./php/usuario_eliminar.php";
            }

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=user_search&page="; /* <== */
            $registros=15;
            $busqueda=$_SESSION['busqueda_usuario']; /* <== */

            # Paginador usuario #
            require_once "./php/usuario_lista.php";
        } 
    ?>
</div>
