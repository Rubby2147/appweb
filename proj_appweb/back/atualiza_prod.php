<?php
include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

$sql = "UPDATE produtos SET nome='$nome', quantidade=$quantidade, preco=$preco WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso! <a href='consulta_prod.php'>Voltar</a>";
} else {
    echo "Erro: " . $conn->error;
}
?>