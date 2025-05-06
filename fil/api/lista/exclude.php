<?php
$file = 'tarefas.txt';

if (file_exists($file)) {
    file_put_contents($file, ""); // limpa o arquivo
}

header("Location: index.php"); // volta para a lista
exit;
?>
