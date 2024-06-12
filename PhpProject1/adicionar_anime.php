<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $diretor = $_POST['diretor'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $genero = $_POST['genero'];
    $assistido = isset($_POST['assistido']) ? 1 : 0;
    $nota = isset($_POST['nota']) ? $_POST['nota'] : null;
    $usuario_id = $_SESSION['usuario_id']; 

    $query = "INSERT INTO animes (titulo, diretor, ano_lancamento, genero, assistido, nota, usuario_id) VALUES ('$titulo', '$diretor', '$ano_lancamento', '$genero', '$assistido', '$nota', '$usuario_id')";
    if (mysqli_query($conexao, $query)) {
        header("Location: crud_animes.php");
    } else {
        echo "Erro ao adicionar anime: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Anime - LeiturasAssistidas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <div class="container">
        <h1>Adicionar Anime</h1>
        <form action="adicionar_anime.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>
            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" required><br>
            <label for="ano_lancamento">Ano de Lançamento:</label>
            <input type="number" id="ano_lancamento" name="ano_lancamento" required><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" required><br>
            <label for="assistido">Já foi assistido?</label>
            <input type="checkbox" id="assistido" name="assistido"><br>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="1" max="10"><br>
            <button type="submit">Adicionar</button>
        </form>
        <p><a href="crud_filmes.php">Voltar</a></p>
    </div>
</body>
</html>
