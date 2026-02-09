<?php
    $modulo_buscador=limpiar_cadena($_POST['modulo_buscador']); // Limpia el valor recibido del formulario para evitar caracteres no deseados

    $modulos=["usuario", "categoria", "producto"];

    if(in_array($modulo_buscador, $modulos)){

    }else{

    }
?>