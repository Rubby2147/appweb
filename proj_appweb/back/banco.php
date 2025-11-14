<?php
// Configurações do banco
$host = 'localhost';
$user = 'root'; // seu usuário do MySQL
$pass = '';     // sua senha do MySQL

// Conecta ao MySQL (sem banco ainda)
$conn = new mysqli($host, $user, $pass);

// Checa conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Cria banco techparts
$sql = "CREATE DATABASE IF NOT EXISTS techparts CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    echo "Banco techparts criado ou já existe.\n";
} else {
    die("Erro ao criar banco: " . $conn->error);
}

$conn->close();
?>

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'techparts';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// SQL para criar tabela clientes
$sqlClientes = "
CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    conta_bancaria VARCHAR(50) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

// SQL para criar tabela produtos
$sqlProdutos = "
CREATE TABLE IF NOT EXISTS produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

// SQL para criar tabela produtos_cliente
$sqlProdutosCliente = "
CREATE TABLE IF NOT EXISTS produtos_cliente (
    id_prod_cliente INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE
) ENGINE=InnoDB;
";

if ($conn->query($sqlClientes) === TRUE) {
    echo "Tabela clientes criada.\n";
} else {
    echo "Erro clientes: " . $conn->error . "\n";
}

if ($conn->query($sqlProdutos) === TRUE) {
    echo "Tabela produtos criada.\n";
} else {
    echo "Erro produtos: " . $conn->error . "\n";
}

if ($conn->query($sqlProdutosCliente) === TRUE) {
    echo "Tabela produtos_cliente criada.\n";
} else {
    echo "Erro produtos_cliente: " . $conn->error . "\n";
}

$conn->close();
?>

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'techparts';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Exemplo de hash bcrypt (crie via password_hash no PHP)
$senha_hash = password_hash('sua_senha_aqui', PASSWORD_BCRYPT);

$sqlInsertCliente = $conn->prepare("INSERT INTO clientes (nome, email, senha_hash, conta_bancaria) VALUES (?, ?, ?, ?)");
$sqlInsertCliente->bind_param("ssss", $nome, $email, $senha, $conta);

$nome = 'João Silva';
$email = 'joao@email.com';
$senha = $senha_hash;
$conta = '0001-01.12345-6';

if ($sqlInsertCliente->execute()) {
    echo "Cliente inserido.\n";
} else {
    echo "Erro inserindo cliente: " . $conn->error . "\n";
}

$conn->close();
?>
