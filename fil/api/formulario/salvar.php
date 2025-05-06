<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $mensagem = trim($_POST["mensagem"]);

    if ($nome == "" || $email == "" || $mensagem == "") {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    $nome = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8');

    $linha = "Nome: $nome\nEmail: $email\nMensagem:\n$mensagem\n------------------\n";

    $arquivo = __DIR__ . '/mensagens.txt';
    file_put_contents($arquivo, $linha, FILE_APPEND);

    echo "Mensagem enviada com sucesso!";
} else {
    echo "Acesso inválido.";
}
?>
