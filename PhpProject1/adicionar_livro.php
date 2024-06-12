<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];
    $lido = isset($_POST['lido']) ? 1 : 0;
    $nota = isset($_POST['nota']) ? $_POST['nota'] : null;
    $usuario_id = $_SESSION['usuario_id']; // Obtendo o ID do usuário logado

    $query = "INSERT INTO livros (titulo, autor, ano_publicacao, genero, lido, nota, usuario_id) VALUES ('$titulo', '$autor', '$ano_publicacao', '$genero', '$lido', '$nota', '$usuario_id')";
    if (mysqli_query($conexao, $query)) {
        header("Location: crud_livros.php");
    } else {
        echo "Erro ao adicionar livro: " . mysqli_error($conexao);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeiturasAssistidas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <div class="container">
        <h1>Adicionar Livro</h1>
        <form action="adicionar_livro.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo"><br>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor"><br>
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao"><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero"><br>
            <label for="lido">Já foi lido?</label>
            <input type="checkbox" id="lido" name="lido"><br>
            <label for="nota">Nota (0-10):</label><br>
            <input type="number" id="nota" name="nota" min="1" max="10"><br>
            <button type="submit">Adicionar</button>
        </form>
        <p><a href="crud_livros.php">Voltar</a></p>
    </div>
</body>
</html>
