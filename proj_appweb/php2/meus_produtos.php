<?php
require 'db.php';
session_start();
if (!isset($_SESSION['id_cliente'])) {
    die("Faça login primeiro. <a href='login.php'>Login</a>");
}

$stmt = $pdo->prepare("SELECT * FROM produtos_cliente WHERE id_cliente = ?");
$stmt->execute([$_SESSION['id_cliente']]);
$produtos = $stmt->fetchAll();
?>
<h2>Meus Produtos</h2>
<?php foreach ($produtos as $p): ?>
  <div>
    <h3><?= htmlspecialchars($p['nome']) ?></h3>
    <p><?= htmlspecialchars($p['descricao']) ?></p>
    <p>Preço: R$<?= number_format($p['preco'], 2, ',', '.') ?></p>
    <?php if ($p['imagem']): ?>
      <img src="<?= $p['imagem'] ?>" width="120">
    <?php endif; ?>
  </div>
<?php endforeach; ?>
<a href="index.php">Voltar</a>
