<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "3030";
    $dbname = "tienda";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibir y sanitizar datos del formulario
    $productName = $conn->real_escape_string($_POST['productName']);
    $customerName = $conn->real_escape_string($_POST['customerName']);
    $customerEmail = $conn->real_escape_string($_POST['customerEmail']);
    $customerPhone = $conn->real_escape_string($_POST['customerPhone']);
    $customerAddress = $conn->real_escape_string($_POST['customerAddress']);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO compras (producto, nombre_cliente, email_cliente, telefono_cliente, direccion_cliente)
            VALUES ('$productName', '$customerName', '$customerEmail', '$customerPhone', '$customerAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "Compra realizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>



