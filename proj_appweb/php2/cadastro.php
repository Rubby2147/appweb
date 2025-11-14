<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $conta = $_POST['conta'];

    // Insere os dados na tabela "usuarios"
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha_hash, conta_bancaria) VALUES (?, ?, ?, ?)");
    try {
        $stmt->execute([$nome, $email, $senha, $conta]);
        echo "Cadastro realizado com sucesso! <a href='login.php'>Faça login</a>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
<form method="POST">
  Nome: <input type="text" name="nome" required><br>
  Email: <input type="email" name="email" required><br>
  Senha: <input type="password" name="senha" required><br>
  Conta Bancária: <input type="text" name="conta" required><br>
  <button type="submit">Cadastrar</button>
</form>
