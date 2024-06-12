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
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];
    $lido = isset($_POST['lido']) ? 1 : 0;
    $nota = $_POST['nota'];

    $query = "UPDATE livros SET titulo='$titulo', autor='$autor', ano_publicacao='$ano_publicacao', genero='$genero', lido='$lido', nota='$nota' WHERE id='$id'";
    if (mysqli_query($conexao, $query)) {
        header("Location: crud_livros.php");
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    $query = "SELECT * FROM livros WHERE id='$id'";
    $result = mysqli_query($conexao, $query);
    $livro = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca Online</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Livro</h1>
        <form action="editar_livro.php?id=<?php echo $id; ?>" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>"><br>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>"><br>
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao" value="<?php echo $livro['ano_publicacao']; ?>"><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?php echo $livro['genero']; ?>"><br>
            <label for="lido">Já foi lido?</label>
            <input type="checkbox" id="lido" name="lido" <?php if ($livro['lido']) echo 'checked'; ?>><br>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="1" max="10" value="<?php echo isset($livro['nota']) ? $livro['nota'] : ''; ?>"><br>
            <button type="submit">Salvar</button>
        </form>
        <p><a href="crud_livros.php">Voltar</a></p>
    </div>
</body>
</html>
