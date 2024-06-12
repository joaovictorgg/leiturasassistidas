<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

$id = $_GET['id'];

$query = "DELETE FROM series WHERE id='$id'";
if (mysqli_query($conexao, $query)) {
    header("Location: crud_series.php");
} else {
    echo "Erro ao excluir série: " . mysqli_error($conexao);
}
?>
