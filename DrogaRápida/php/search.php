<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entrega_remedios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT * FROM produtos WHERE nome LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['nome'] . " - " . $row['preco'] . "</p>";
    }
} else {
    echo "Nenhum produto encontrado.";
}

$conn->close();
?>
