<?php
$servername = "localhost";
$database = "conect";
$username = "root";
$password = "";
// Criando a conexão

$conn = mysqli_connect($servername, $username, $password, $database);

// Checando a conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Conectado com sucesso";

?>