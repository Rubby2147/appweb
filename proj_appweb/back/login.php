<?php

session_start();

include 'conexao.php';

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "select * from usuarios where usuario='$usuario' and senha='$senha'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['usuario']= $usuario;
    header('location: dashboard.php');
}    else{
    echo'login invalido!';
}