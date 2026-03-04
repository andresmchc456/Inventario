<?php
    require_once "./php/main.php";// Requerimos el archivo main.php para tener acceso a las funciones y configuraciones necesarias para esta vista.
    
    $id=(isset($_GET['user_id_up'])) ? $_GET['user_id_up'] : 0 ;// Obtenemos el ID del usuario a actualizar desde la URL, si no se proporciona, se asigna 0.
    $id=limpiar_cadena($id);// Limpiamos el ID para evitar inyecciones de código o caracteres no deseados.
?>
<div class="container-fluid mb-6">

    <?php if($id==$_SESSION['id']){?>
	<h1>Mi cuenta</h1>
	<h2>Actualizar datos de mi cuenta</h2>
    <?php
        }else{ ?>
        <h1>Usuarios</h1>
	    <h2>Actualizar usuarios</h2>
        <?php }?>

</div>

<div class="container pb-6 pt-6">

    <?php include "./inc/btn_back.php"; 
        
          $check_usuario=conexion();
          $check_usuario=$check_usuario->query("SELECT * FROM usuario WHERE usuario_id='$id'");
          if($check_usuario->rowCount()>0){
            $datos=$check_usuario->fetch();
    ?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/usuario_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" value="<?php echo $datos['usuario_id']; ?>" name="usuario_id" required > <!-- Campo oculto para enviar el ID del usuario a actualizar -->
		
		<div class="row">
		  	<div class="col">
		    	<div class="mb-3">
					<label for="usuario_nombre" class="form-label">Nombres</label>
				  	<input class="form-control" type="text" name="usuario_nombre" value="<?php echo $datos['usuario_nombre']; ?>
                    " id="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="col">
		    	<div class="mb-3">
					<label for="usuario_apellido" class="form-label">Apellidos</label>
				  	<input class="form-control" type="text" name="usuario_apellido" 
                    value="<?php echo $datos['usuario_apellido']; ?>" 
                    id="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required > <!-- Campo para el apellido del usuario, con validación de caracteres y longitud  es el value-->
				</div>
		  	</div>
		</div>
		<div class="row">
		  	<div class="col">
		    	<div class="mb-3">
					<label for="usuario_usuario" class="form-label">Usuario</label>
				  	<input class="form-control" type="text" name="usuario_usuario" 
                    value="<?php echo $datos['usuario_usuario']; ?>"
                    id="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="col">
		    	<div class="mb-3">
					<label for="usuario_email" class="form-label">Email</label>
				  	<input class="form-control" type="email" name="usuario_email"
                    value="<?php echo $datos['usuario_email']; ?>" 
                    id="usuario_email" maxlength="70" >
				</div>
		  	</div>
		</div>
		<br><br>
		<p class="text-center">
			SI desea actualizar la clave de este usuario por favor llene los 2 campos. Si NO desea actualizar la clave deje los campos vacíos.
		</p>
		<br>
		<div class="row">
			<div class="col">
		    	<div class="mb-3">
					<label for="usuario_clave_1" class="form-label">Clave</label>
				  	<input class="form-control" type="password" name="usuario_clave_1" id="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		  	<div class="col">
		    	<div class="mb-3">
					<label for="usuario_clave_2" class="form-label">Repetir clave</label>
				  	<input class="form-control" type="password" name="usuario_clave_2" id="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		</div>
		<br><br><br>
		<p class="text-center">
			Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
		</p>
		<div class="row">
		  	<div class="col">
		    	<div class="mb-3">
					<label for="administrador_usuario" class="form-label">Usuario</label>
				  	<input class="form-control" type="text" name="administrador_usuario" id="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="col">
		    	<div class="mb-3">
					<label for="administrador_clave" class="form-label">Clave</label>
				  	<input class="form-control" type="password" name="administrador_clave" id="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<p class="text-center">
			<button type="submit" class="btn btn-success rounded-pill">Actualizar</button>
		</p>
	</form>

    <?php }else{
        include "./inc/error_alert.php";
        }
        $check_usuario=null;
    ?>

   
	
</div>