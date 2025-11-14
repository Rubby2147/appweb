<?php
$host = "localhost";
$user = "root";
$pass = "Welcome@ads";
$db = "estoque";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
