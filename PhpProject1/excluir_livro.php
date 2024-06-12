<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

$id = $_GET['id'];

$query = "DELETE FROM livros WHERE id='$id'";
if (mysqli_query($conexao, $query)) {
    header("Location: crud_livros.php");
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>
