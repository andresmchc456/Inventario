const formularios_ajax = document.querySelectorAll(".formulario_ajax");

function enviar_Formulario_ajax(e) {
    e.preventDefault();
    let enviar = confirm("¿Seguro que deseas enviar el formulario?");

    if (enviar) {
        let contenedor = document.querySelector(".form-rest");
        contenedor.innerHTML = ""; // Limpia mensaje previo

        // Usar validación HTML5 (pattern, required, email, etc.)
        if (!this.checkValidity()) {
            contenedor.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong><br>
                    Verifica que todos los campos tengan el formato correcto.
                </div>
            `;
            return;
        }

        // Validar contraseñas
        let pass1 = this.querySelector("#exampleInputPassword1").value.trim();
        let pass2 = this.querySelector("#InputPassword2").value.trim();
        if (pass1 !== pass2) {
            contenedor.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong><br>
                    Las contraseñas no coinciden.
                </div>
            `;
            return;
        }

        // Enviar datos
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        fetch(action, {
            method: method,
            mode: "cors",
            cache: "no-cache",
            body: data
        })
        .then(respuesta => respuesta.text())
        .then(respuesta => {
            contenedor.innerHTML = respuesta;
        });
    }
}

formularios_ajax.forEach(formulario => {
    formulario.addEventListener("submit", enviar_Formulario_ajax);
});
