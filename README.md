# LeiturasAssistidas

LeiturasAssistidas é uma aplicação web para gerenciar e avaliar livros, filmes, animes e séries que você já leu ou assistiu. A aplicação permite adicionar, editar, excluir e visualizar informações sobre esses itens.

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Font Awesome

## Funcionalidades

- **Cadastro de Usuários**: Permite que novos usuários se cadastrem.
- **Login de Usuários**: Permite que usuários cadastrados façam login.
- **Gerenciamento de Livros**: Adicionar, editar, excluir e visualizar livros.
- **Gerenciamento de Filmes**: Adicionar, editar, excluir e visualizar filmes.
- **Gerenciamento de Animes**: Adicionar, editar, excluir e visualizar animes.
- **Gerenciamento de Séries**: Adicionar, editar, excluir e visualizar séries.

## Estrutura do Projeto

- `index.php`: Página inicial do projeto.
- `login.php`, `login.html`: Páginas de login.
- `cadastro.php`, `cadastro.html`: Páginas de cadastro de novos usuários.
- `principal.php`: Página principal após login.
- `crud_livros.php`, `crud_filmes.php`, `crud_animes.php`, `crud_series.php`: Páginas para gerenciar livros, filmes, animes e séries, respectivamente.
- `adicionar_livro.php`, `adicionar_filme.php`, `adicionar_anime.php`, `adicionar_serie.php`: Páginas para adicionar novos itens.
- `editar_livro.php`, `editar_filme.php`, `editar_anime.php`, `editar_serie.php`: Páginas para editar itens existentes.
- `excluir_livro.php`, `excluir_filme.php`, `excluir_anime.php`, `excluir_serie.php`: Páginas para excluir itens.
- `conexao.php`: Arquivo de configuração de conexão com o banco de dados.

## Instalação

### Pré-requisitos

- Servidor web (ex: Apache)
- PHP
- MySQL

### Passos

1. Clone o repositório:
    ```bash
    git clone https://github.com/joaovictorgg/leiturasassistidas.git
    ```

2. Navegue até o diretório do projeto:
    ```bash
    cd leiturasassistidas
    ```

3. Importe o banco de dados MySQL:
    - Crie um banco de dados chamado `listas_assistidas`.
    - Importe o arquivo `database.sql` para o banco de dados.

    ```sql
    CREATE DATABASE listas_assistidas;
    USE listas_assistidas;

    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_completo VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL
    );

    CREATE TABLE livros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        autor VARCHAR(255) NOT NULL,
        ano_publicacao INT NOT NULL,
        genero VARCHAR(100),
        lido BOOLEAN DEFAULT 0,
        nota INT,
        usuario_id INT,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    );

    CREATE TABLE filmes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        diretor VARCHAR(255) NOT NULL,
        ano_lancamento INT NOT NULL,
        genero VARCHAR(100),
        lido BOOLEAN DEFAULT 0,
        nota INT,
        usuario_id INT,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    );

    CREATE TABLE series (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        diretor VARCHAR(255) NOT NULL,
        ano_lancamento INT NOT NULL,
        genero VARCHAR(100),
        assistido BOOLEAN DEFAULT 0,
        nota INT,
        usuario_id INT,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    );

    CREATE TABLE animes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        diretor VARCHAR(255) NOT NULL,
        ano_lancamento INT NOT NULL,
        genero VARCHAR(100),
        assistido BOOLEAN DEFAULT 0,
        nota INT,
        usuario_id INT,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    );
    ```

4. Configure o acesso ao banco de dados:
    - Edite o arquivo `conexao.php` e configure os detalhes de conexão com seu banco de dados MySQL.

    ```php
    <?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "listas_assistidas";

    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    ?>
    ```

5. Inicie o servidor web e acesse o projeto no navegador:
    ```bash
    http://localhost/listas_assistidas
    ```

## Utilização

- **Página Principal**: Acesse a página principal onde você pode gerenciar livros, filmes, animes e séries.
- **Cadastro**: Cadastre-se para criar uma conta.
- **Login**: Faça login com suas credenciais.
- **Gerenciamento**: Adicione, edite e exclua itens (livros, filmes, animes, séries) conforme necessário.

## Contato

João Victor Gomes de Souza

[![LinkedIn](https://skillicons.dev/icons?i=linkedin)](https://www.linkedin.com/in/joaovictorgomes-desouza/) [![Gmail](https://skillicons.dev/icons?i=gmail)](https://www.linkedin.com/in/joaovictorgomes-desouza/)


[Repositório no GitHub](https://github.com/joaovictorgg/leiturasassistidas)
