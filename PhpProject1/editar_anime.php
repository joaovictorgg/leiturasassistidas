<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $diretor = $_POST['diretor'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $genero = $_POST['genero'];
    $assistido = isset($_POST['assistido']) ? 1 : 0;
    $nota = $_POST['nota'];

    $query = "UPDATE animes SET titulo='$titulo', diretor='$diretor', ano_lancamento='$ano_lancamento', genero='$genero', assistido='$assistido', nota='$nota' WHERE id='$id'";
    if (mysqli_query($conexao, $query)) {
        header("Location: crud_animes.php");
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    $query = "SELECT * FROM animes WHERE id='$id'";
    $result = mysqli_query($conexao, $query);
    $anime = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime - LeiturasAssistidas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <div class="container">
        <h1>Editar Anime</h1>
        <form action="editar_anime.php?id=<?php echo $id; ?>" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $anime['titulo']; ?>"><br>
            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" value="<?php echo $anime['diretor']; ?>"><br>
            <label for="ano_lancamento">Ano de Lançamento:</label>
            <input type="number" id="ano_lancamento" name="ano_lancamento" value="<?php echo $anime['ano_lancamento']; ?>"><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?php echo $anime['genero']; ?>"><br>
            <label for="assistido">Já foi assistido?</label>
            <input type="checkbox" id="assistido" name="assistido" <?php if ($anime['assistido']) echo 'checked'; ?>><br>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="1" max="10" value="<?php echo isset($anime['nota']) ? $anime['nota'] : ''; ?>"><br>
            <button type="submit">Salvar</button>
        </form>
        <p><a href="crud_animes.php">Voltar</a></p>
    </div>
</body>
</html>
