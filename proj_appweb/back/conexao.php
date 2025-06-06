<?php

$host = "localhost";
$user= "root";
$pass ="Welcome@ads";
$db = "estoque";
$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    die("falha de conexão". $conn->connect_error);
}
