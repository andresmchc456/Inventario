<!-- funciones principales 
conexion base de datos  con extencio pdo-->
<!-- instacia la clase PDO -->
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión establecida correctamente";
} catch (PDOException $e) {
    echo "❌ Error en la conexión: " . $e->getMessage();
}
?>
