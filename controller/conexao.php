<?php
// Configurações do banco de dados
$servername = "172.106.0.125";
$username = "sites";
$password = "blackbird123@#";
$dbname = "sites";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
