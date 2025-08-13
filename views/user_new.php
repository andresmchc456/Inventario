<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Contenedor para mensajes -->
            <div class="form-rest mb-3"></div>

            <form class="formulario_ajax" method="POST" action="./php/usuario_guardar.php" novalidate>
                
                <!-- Nombre -->
                <div class="mb-3">
                    <label for="InputName" class="form-label">Nombre completo</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="InputName" 
                        name="InputName" 
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" 
                        placeholder="Ej: Juan Carlos" 
                        title="Solo se permiten letras y espacios (3 a 40 caracteres)" 
                        required
                    >
                </div>

                <!-- Apellidos -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellidos</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="lastName" 
                        name="lastName" 
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" 
                        placeholder="Ej: Pérez Gómez"
                        title="Solo se permiten letras y espacios (3 a 40 caracteres)" 
                        required
                    >
                </div>

                <!-- Usuario -->
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="user" 
                        name="user" 
                        pattern="[a-zA-Z0-9]{4,20}" 
                        placeholder="Ej: juan123" 
                        title="Debe contener entre 4 y 20 caracteres sin espacios" 
                        required
                    >
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Correo electrónico</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="InputEmail1" 
                        name="InputEmail1" 
                        placeholder="Ej: correo@dominio.com"
                        required
                    >
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="exampleInputPassword1" 
                        name="exampleInputPassword1"
                        placeholder="Mínimo 6 caracteres" 
                        required
                    >
                </div>

                <!-- Repetir contraseña -->
                <div class="mb-3">
                    <label for="InputPassword2" class="form-label">Repite la Contraseña</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="InputPassword2" 
                        name="InputPassword2"
                        placeholder="Repite la contraseña"
                        required
                    >
                </div>

                <!-- Botón -->
                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script src="./js/formulario.js"></script>
