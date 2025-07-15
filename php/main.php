<!-- funciones principales 
conexion base de datos  con extencio pdo-->
<!-- instacia la clase PDO -->
 <!-- http://localhost/Inventario/php/main.php -->
<?php
function conexion(){
    try {
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');// Cambia 'root' y '' por tus credenciales de base de datos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Configurar el modo de error para lanzar excepciones
    echo "✅ Conexión establecida correctamente<br>";
    return $pdo; // Retorna la instancia de PDO para su uso posterior
    } catch (PDOException $e) {// Capturar errores de conexión
        echo "❌ Error en la conexión: " . $e->getMessage();
        exit(); // detener el script si falla la conexión
    }
}

// peticion o insercion en la base de datos en la tabla categoria
// $pdo->query("INSERT INTO categoria(categoria_nombre, categoria_ubicacion) VALUES('prueba', 'texto ubicacion')");
?>
