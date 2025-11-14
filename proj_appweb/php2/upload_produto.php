<?php
require 'db.php';
session_start();
if (!isset($_SESSION['id_cliente'])) {
    die("Faça login primeiro. <a href='login.php'>Login</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $dir = "uploads/";
        if (!is_dir($dir)) mkdir($dir);
        $imagem = $dir . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    $stmt = $pdo->prepare("INSERT INTO produtos_cliente (id_cliente, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_SESSION['id_cliente'], $nome, $descricao, $preco, $imagem]);

    echo "Produto cadastrado! <a href='meus_produtos.php'>Ver meus produtos</a>";
}
?>
<form method="POST" enctype="multipart/form-data">
  Nome: <input type="text" name="nome" required><br>
  Descrição: <textarea name="descricao"></textarea><br>
  Preço: <input type="number" step="0.01" name="preco" required><br>
  Imagem: <input type="file" name="imagem"><br>
  <button type="submit">Cadastrar Produto</button>
</form>
