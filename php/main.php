<!-- funciones principales 
conexion base de datos  con extencio pdo-->
<!-- instacia la clase PDO -->
 <!-- http://localhost/Inventario/php/main.php -->
  <!-- $nombre parametro -->

<?php
function conexion(){
    try {
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');// Cambia 'root' y '' por tus credenciales de base de datos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Configurar el modo de error para lanzar excepciones
    // echo "✅ Conexión establecida correctamente<br>";
    return $pdo; // Retorna la instancia de PDO para su uso posterior
    } catch (PDOException $e) {// Capturar errores de conexión
        echo "❌ Error en la conexión: " . $e->getMessage();
        exit(); // detener el script si falla la conexión
    }
}
// 👇 Ejecutar la función
$pdo = conexion();

// peticion o insercion en la base de datos en la tabla categoria
 $pdo->query("INSERT INTO categoria(categoria_nombre, categoria_ubicacion) VALUES('prueba', 'texto ubicacion')");


#verificar datos de formulario
 function verificar_datos($filtro, $cadena){
     if(preg_match("/^".$filtro."$/", $cadena)){
         return false;
     }else{
         return true;
     }
 }

 #lipiar cadenas de texto
 function limpiar_cadena($cadena){
    $cadena = trim($cadena); // Elimina espacios al inicio y al final
    $cadena  = stripslashes($cadena); // Elimina barras invertidas
    $cadena = str_ireplace("<script>", "", $cadena);// Elimina caracteres especiales
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena=str_ireplace("<script src", "", $cadena);
    $cadena=str_ireplace("<script type=", "", $cadena);
    $cadena=str_ireplace("SELECT * FROM", "", $cadena);
    $cadena=str_ireplace("DELETE FROM", "", $cadena);
    $cadena=str_ireplace("INSERT INTO", "", $cadena);
    $cadena=str_ireplace("DROP TABLE", "", $cadena);
    $cadena=str_ireplace("DROP DATABASE", "", $cadena);
    $cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena=str_ireplace("SHOW TABLES;", "", $cadena);
    $cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
    $cadena=str_ireplace("<?php", "", $cadena);
    $cadena=str_ireplace("?>", "", $cadena);
    $cadena=str_ireplace("--", "", $cadena);
    $cadena=str_ireplace("^", "", $cadena);
    $cadena=str_ireplace("<", "", $cadena);
    $cadena=str_ireplace("[", "", $cadena);
    $cadena=str_ireplace("]", "", $cadena);
    $cadena=str_ireplace("==", "", $cadena);
    $cadena=str_ireplace(";", "", $cadena);
    $cadena=str_ireplace("::", "", $cadena);
    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);
    return $cadena;
 }
//  $texto="<script>  Hola mundo </script>";
//  echo limpiar_cadena($texto);

#funcion renombrar fotos
 function renombrar_fotos($nombre){
    $nombre=str_ireplace(" ", "_", $nombre);
    $nombre=str_ireplace("/", "_", $nombre);
    $nombre=str_ireplace("#", "_", $nombre);
    $nombre=str_ireplace("-", "_", $nombre);
    $nombre=str_ireplace("$", "_", $nombre);
    $nombre=str_ireplace(".", "_", $nombre);
    $nombre=str_ireplace(",", "_", $nombre);
    $nombre=$nombre."_".rand(0,100);// Agrega un número aleatorio al final del nombre
    return $nombre;
 }

//  $foto="Play Station 5 Black/edition";
//  echo renombrar_fotos($foto); // Muestra el nombre de la foto renombrado

#funcio de paginadord de tablas

    function paginador_tablas($pagina, $Npaginas, $url, $botones){
        $tabla = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

        // Botón anterior
        if($pagina <= 1){
            $tabla .= '<li class="page-item disabled"><span class="page-link">Anterior</span></li>';
        } else {
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.($pagina - 1).'">Anterior</a></li>';
        }

        // Mostrar primer número si estamos lejos del principio
        if($pagina > floor($botones / 2) + 1){
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.'1">1</a></li>';
            $tabla .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }

        // Cálculo del rango de páginas a mostrar
        $rango_inicial = max(1, $pagina - floor($botones / 2));
        $rango_final = min($Npaginas, $rango_inicial + $botones - 1);

        if (($rango_final - $rango_inicial + 1) < $botones) {
            $rango_inicial = max(1, $rango_final - $botones + 1);
        }

        for($i = $rango_inicial; $i <= $rango_final; $i++){
            if($ci=$pagina>=$botones){
                break;
            }

            if($i == $pagina){
                $tabla .= '<li class="page-item active"><span class="page-link">'.$i.'</span></li>';
            } else {
                $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
            }

            $ci++;
        }

        // Mostrar último número si estamos lejos del final
        if($rango_final < $Npaginas){
            $tabla .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>';
        }

        // Botón siguiente
        if($pagina >= $Npaginas){
            $tabla .= '<li class="page-item disabled"><span class="page-link">Siguiente</span></li>';
        } else {
            $tabla .= '<li class="page-item"><a class="page-link" href="'.$url.($pagina + 1).'">Siguiente</a></li>';
        }

        $tabla .= '</ul></nav>';
        return $tabla;
    }

?>
