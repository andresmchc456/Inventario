<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- ancho de 6 columnas en pantallas medianas -->

            <!-- respuesta AJAX: se usa para mostrar mensajes de éxito o error después de enviar el formulario -->
            <div class="from-rest"></div>
            <div class="form-rest mb-3"></div> <!-- respuesta AJAX: enviar un formulario mediante AJAX o integrar un formulario HTML con envío asíncrono -->

            <form class="formulario_ajax" method="POST" action="./php/usuario_guardar.php" novalidate>
                <!-- Nombre -->
                <div class="mb-3">
                    <label for="InputName" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="nameHelp" required>
                </div>
                
                <!-- Apellidos -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp" required>
                </div>
                
                <!-- Usuario -->
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" name="user" aria-describedby="lastNameHelp" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Dirección de correo electrónico</label>
                    <input type="email" class="form-control" id="InputEmail1" name="InputEmail1" aria-describedby="emailHelp" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" required>
                </div>

                <!-- Repetir contraseña -->
                <div class="mb-3">
                    <label for="InputPassword2" class="form-label">Repite la Contraseña</label>
                    <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" required>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <!-- Script para mostrar alerta si faltan campos -->
            <script>
                document.querySelector(".formulario_ajax").addEventListener("submit", function(event) {
                    if (!this.checkValidity()) {
                        event.preventDefault();
                        document.querySelector(".form-rest").innerHTML = `
                            <div class="alert alert-danger" role="alert">
                                <strong>¡Ocurrió un error inesperado!</strong><br>
                                No has llenado todos los campos que son obligatorios
                            </div>
                        `;
                    }
                });
            </script>

        </div>
    </div>
</div>
