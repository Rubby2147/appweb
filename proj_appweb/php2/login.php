<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nome'] = $user['nome'];
        header("Location: index.php");
        exit;
    } else {
        echo "Email ou senha inválidos!";
    }
}
?>
<form method="POST">
  Email: <input type="email" name="email" required><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Login</button>
</form>
