const formularios_ajax = document.querySelectorAll(".formulario_ajax"); // Selecciona todos los formularios con la clase "formulario_ajax"

function enviar_Formulario_ajax(e) { // Función para enviar el formulario mediante AJAX
    e.preventDefault(); // Evita que el formulario se envíe de forma tradicional
    let enviar = confirm("¿Seguro que deseas enviar el formulario?"); // Pide confirmación al usuario
    
    if (enviar == true) {

        // --- Validar campos obligatorios antes de enviar ---
        let camposVacios = false;
        this.querySelectorAll("[required]").forEach(campo => {
            if (!campo.value.trim()) {
                camposVacios = true;
            }
        });

        if (camposVacios) {
            let contenedor = document.querySelector(".from-rest");
            contenedor.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    No has llenado todos los campos que son obligatorios
                </div>
            `;
            return; // Detiene el envío
        }

        let data = new FormData(this); // Crea un objeto FormData con los datos del formulario
        let method = this.getAttribute("method"); // Obtiene el método de envío del formulario (GET o POST)
        let action = this.getAttribute("action"); // Obtiene la URL de acción del formulario

        let encabezado = { // Define la configuración para la solicitud fetch
            method: method,
            mode: "cors", // Define el modo de la solicitud
            cache: "no-cache", // No utiliza caché
            body: data
        };

        fetch(action, encabezado) // Envía la solicitud al servidor
            .then(respuesta => respuesta.text()) // Convierte la respuesta del servidor a texto
            .then(respuesta => {
                let contenedor=document.querySelector(".form-rest");

                contenedor.innerHTML = respuesta; // Inserta la respuesta del servidor en el contenedor
            });
    }
}

formularios_ajax.forEach(formulario => { // Itera sobre cada formulario seleccionado
    formulario.addEventListener("submit", enviar_Formulario_ajax);
});