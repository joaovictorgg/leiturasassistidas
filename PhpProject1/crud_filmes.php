<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$query = "SELECT * FROM filmes WHERE usuario_id='$usuario_id'";
$result = mysqli_query($conexao, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Filmes - LeiturasAssistidas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            color: #333;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f9;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .button-group {
            margin-top: 20px;
            text-align: center;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        footer {
           background-color: rgba(255, 255, 255, 0.2); 
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .gradient-text {
            background: rgb(224,255,10);
            background: linear-gradient(90deg, rgba(224,255,10,1) 0%, rgba(95,39,156,1) 46%, rgba(255,0,9,1) 95%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .social-icons a {
            color: #000;
            margin: 0 10px;
            font-size: 25px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciar Filmes</h1>
        <p>Nesta página, você pode visualizar, editar e excluir os filmes que estão cadastrados no sistema.</p>
        <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Diretor</th>
                    <th>Ano de Lançamento</th>
                    <th>Gênero</th>
                    <th>Já foi assistido?</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($filme = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($filme['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($filme['diretor']); ?></td>
                        <td><?php echo htmlspecialchars($filme['ano_lancamento']); ?></td>
                        <td><?php echo htmlspecialchars($filme['genero']); ?></td>
                        <td><?php echo $filme['lido'] ? 'Sim' : 'Não'; ?></td>
                        <td><?php echo isset($filme['nota']) ? htmlspecialchars($filme['nota']) : 'N/A'; ?></td>
                        <td>
                            <a href="editar_filme.php?id=<?php echo $filme['id']; ?>">Editar</a>
                            <a href="excluir_filme.php?id=<?php echo $filme['id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nenhum filme encontrado.</p>
        <?php endif; ?>
        <div class="button-group">
            <a href="adicionar_filme.php" class="button">Adicionar Novo Filme</a>
            <a href="principal.php" class="button">Voltar</a>
        </div>
    </div>

    <footer>
        <div class="social-icons">
            <a href="https://www.linkedin.com/in/joaovictorgomes-desouza" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/joaovictorgg" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.instagram.com/joaovictorgg._/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>Copyright &copy; 2024 Feito por João Victor. Todos os direitos reservados.</p>
        <p>Desenvolvido com <span class="gradient-text">| PHP | HTML | CSS | JavaScript |</span></p>
    </footer>
</body>
</html>
