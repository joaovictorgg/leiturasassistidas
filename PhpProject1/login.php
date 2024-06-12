<?php
session_start();
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT id, nome_completo FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['nome_completo'] = $row['nome_completo'];
    echo json_encode(array('sucesso' => true));
} else {
    echo json_encode(array('sucesso' => false, 'mensagem' => 'Email ou senha inválidos'));
}
?>
