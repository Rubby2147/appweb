<?php
$host = "localhost";
$dbname = "techparts";
$user = "root"; // coloque seu usuário
$pass = "welcome@ads";     // coloque sua senha

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
