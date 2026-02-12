<?php
    $modulo_buscador=limpiar_cadena($_POST['modulo_buscador']); // Limpia el valor recibido del formulario para evitar caracteres no deseados

    $modulos=["usuario", "categoria", "producto"];// Define los módulos permitidos para la búsqueda

    if(in_array($modulo_buscador, $modulos)){

    }else{
        echo'
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
            <p class="mb-0">El módulo de búsqueda no es válido.</p>
        ';
    }
?>