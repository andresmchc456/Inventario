const formularios_ajax=document.querySelectorAll(".formulario_ajax");// Selecciona todos los formularios con la clase "formulario_ajax"

function enviar_Formulario_ajax(e){// Función para enviar el formulario mediante AJAX
    e.preventDefault();
    let enviar= confirm("¿Seguro que deseas enviar el formulario?");
    
    if(enviar==true){

        let data=new FormData(this);// Crea un objeto FormData con los datos del formulario
        let metthod=this.getAttribute("method");// Obtiene el método de envío del formulario (GET o POST)
        let action=this.getAttribute("action");// Obtiene la URL de acción del formulario

        let encabezado={// Define los encabezados para la solicitud
            metthod:metthod,
            headers:encabezado,
            mode:"cors",// Define el modo de la solicitud
            cache:"no-cache",// No utiliza caché
            body:data
        };

        fetch(action, encabezado)// Envía la solicitud al servidor
        .then(respuesta => respuesta.text())// Convierte la respuesta del servidor a texto
        .then(respuesta =>{
            let contenedor=document.querySelector(".from-rest");
            contenedor.innerHTML=respuesta;// Inserta la respuesta del servidor en el contenedor
        });
    }
}

formularios_ajax.forEach(formularios => {// Itera sobre cada formulario seleccionado
    formularios.addEventListener("submit", enviar_Formulario_ajax);
});