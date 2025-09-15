<div class="container-fluid mb-4">
    <h1 class="h2">Usuarios</h1>
    <h2 class="h5 text-muted">Lista de usuarios</h2>
</div>

<div class="container py-4">  
    <?php
        require_once "./php/main.php";

        # Eliminar usuario #
        if(isset($_GET['user_id_del'])){
            require_once "./php/usuario_eliminar.php";//
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
        $url="index.php?vista=user_list&page=";
        $registros=15;
        $busqueda="";

        #  usuario  tabla#
        require_once "./php/usuario_lista.php";

    ?>
</div>
