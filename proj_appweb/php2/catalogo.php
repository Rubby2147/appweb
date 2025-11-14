<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM produtos UNION SELECT * FROM produtos_cliente");
$produtos = $stmt->fetchAll();
?>
<h2>Catálogo de Produtos</h2>
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
