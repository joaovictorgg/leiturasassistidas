function validarCadastro() {
    var nomeCompleto = document.getElementById('nome_completo').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (nomeCompleto === '' || email === '' || senha === '') {
        alert('Todos os campos devem ser preenchidos.');
        return false;
    }
    return true;
}

function validarLogin() {
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
        alert('Todos os campos devem ser preenchidos.');
        return false;
    }
    return true;
}

window.onload = function() {
    var mensagem = "Aqui você pode registrar e avaliar os filmes e livros que já assistiu ou leu!";
    var velocidade = 50; 
    var index = 0;
    var elemento = document.getElementById("mensagem");

    elemento.innerHTML = "";

    var intervalo = setInterval(function() {
        if (index < mensagem.length) {
            elemento.textContent += mensagem[index];
            index++;
        } else {
            clearInterval(intervalo);
        }
    }, velocidade);
};
