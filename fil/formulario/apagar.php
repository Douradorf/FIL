<?php
$arquivo = __DIR__ . "/mensagens.txt";

if (file_exists($arquivo)) {
    file_put_contents($arquivo, ""); 
    echo "Mensagens apagadas com sucesso!";
} else {
    echo "Nenhuma mensagem para apagar.";
}
?>
