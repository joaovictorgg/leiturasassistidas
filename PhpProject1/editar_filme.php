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
    $lido = isset($_POST['lido']) ? 1 : 0;
    $nota = $_POST['nota'];

    $query = "UPDATE filmes SET titulo='$titulo', diretor='$diretor', ano_lancamento='$ano_lancamento', genero='$genero', lido='$lido', nota='$nota' WHERE id='$id'";
    if (mysqli_query($conexao, $query)) {
        header("Location: crud_filmes.php");
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    $query = "SELECT * FROM filmes WHERE id='$id'";
    $result = mysqli_query($conexao, $query);
    $filme = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme - LeiturasAssistidas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <div class="container">
        <h1>Editar Filme</h1>
        <form action="editar_filme.php?id=<?php echo $id; ?>" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $filme['titulo']; ?>"><br>
            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" value="<?php echo $filme['diretor']; ?>"><br>
            <label for="ano_lancamento">Ano de Lançamento:</label>
            <input type="number" id="ano_lancamento" name="ano_lancamento" value="<?php echo $filme['ano_lancamento']; ?>"><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?php echo $filme['genero']; ?>"><br>
            <label for="lido">Já foi assistido?</label>
            <input type="checkbox" id="lido" name="lido" <?php if ($filme['lido']) echo 'checked'; ?>><br>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="1" max="10" value="<?php echo isset($filme['nota']) ? $filme['nota'] : ''; ?>"><br>
            <button type="submit">Salvar</button>
        </form>
        <p><a href="crud_filmes.php">Voltar</a></p>
    </div>
</body>
</html>
