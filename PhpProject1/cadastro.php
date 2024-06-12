<?php
include 'conexao.php';

$nome_completo = $_POST['nome_completo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "INSERT INTO usuarios (nome_completo, email, senha) VALUES ('$nome_completo', '$email', '$senha')";
if (mysqli_query($conexao, $query)) {
    header("Location: login.html");
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>
