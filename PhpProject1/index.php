<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeiturasAssistidas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/scripts.js" defer></script>
    <style>
        
         footer {
           background-color: rgba(255, 255, 255, 0.2); 
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1); 
            color: #000;
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
        <h1>Bem-vindo à LeiturasAssistidas!</h1>
        <p id="mensagem"> Aqui você pode registrar e avaliar os filmes e livros que já assistiu ou leu!</p>
        <p><a href="login.html" class="button">Login</a> ou <a href="cadastro.html" class="button">Cadastre-se</a></p>
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
</body>
</html>
