<div class="d-flex justify-content-center align-items-center vh-100 bg-light">   
    <div class="card w-100 shadow" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Sistema de Inventario</h2>

            <!-- MENSAJES DE ERROR ARRIBA DEL FORM -->
            <div class="mb-3">
                <?php
                    if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){ 
                        require_once "./php/main.php"; 
                        require_once "./php/iniciar_sesion.php"; 
                    }
                ?>
            </div>

            <!-- FORMULARIO -->
            <form class="box login row g-3" action="" method="POST" autocomplete="off">
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="inputEmail4" name="login_usuario" required>
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="login_clave" required>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Recuérdame
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){ // Verificar si se envió el formulario
        require_once "./php/main.php"; // archivo con limpiar_cadena y verificar_datos
        require_once "./php/iniciar_sesion.php";// archivo con la función iniciar_sesion
    }
?>
