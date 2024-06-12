<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "listas_assistidas";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
