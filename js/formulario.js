const formularios_ajax = document.querySelectorAll(".formulario_ajax");

function enviar_Formulario_ajax(e) {
    e.preventDefault();
    let enviar = confirm("¿Seguro que deseas enviar el formulario?");

    if (enviar) {
        let contenedor = document.querySelector(".form-rest");
        contenedor.innerHTML = ""; // Limpia mensaje previo

        // Limpiar mensajes previos de error
        this.querySelectorAll(".is-invalid").forEach(el => el.classList.remove("is-invalid"));
        this.querySelectorAll(".invalid-feedback").forEach(el => el.remove());

        let primerError = null;

        // Validar cada campo
        this.querySelectorAll("input, select, textarea").forEach(campo => {
            if (!campo.checkValidity()) {
                campo.classList.add("is-invalid");

                let msg = document.createElement("div");
                msg.className = "invalid-feedback";
                msg.textContent = campo.validationMessage;
                campo.parentElement.appendChild(msg);

                if (!primerError) primerError = campo;
            }
        });

        // Si hay errores, detener y mostrar mensaje general
        if (primerError) {
            primerError.focus();
            contenedor.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong><br>
                    Revisa los campos marcados en rojo.
                </div>
            `;
            return;
        }

        // Validar contraseñas
        let pass1 = this.querySelector("#exampleInputPassword1").value.trim();
        let pass2 = this.querySelector("#InputPassword2").value.trim();
        if (pass1 !== pass2) {
            let pass2Input = this.querySelector("#InputPassword2");
            pass2Input.classList.add("is-invalid");

            let msg = document.createElement("div");
            msg.className = "invalid-feedback";
            msg.textContent = "Las contraseñas no coinciden.";
            pass2Input.parentElement.appendChild(msg);

            pass2Input.focus();
            contenedor.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong><br>
                    Las contraseñas no coinciden.
                </div>
            `;
            return;
        }

        // Enviar datos por AJAX
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
