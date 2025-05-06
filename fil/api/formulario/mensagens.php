<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mensagens Recebidas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Mensagens Recebidas</h2>
<pre id="conteudo">
<?php
$arquivo = "mensagens.txt";
if (file_exists($arquivo) && filesize($arquivo) > 0) {
echo htmlspecialchars(file_get_contents($arquivo));
} else {
echo "Nenhuma mensagem ainda.";
}
?>
</pre>
        <div id="status" style = "text-align: center; margin-bottom: 20px"></div>

        <button class="apagar" onclick="apagarMensagens()">Apagar Mensagens</button>

        <form action="index.html" method="get">
        <button class = voltar style = "margin-top: 15px;" type="submit">Voltar para o Formulario</button>
        </form>

    </div>
    <script>
        function apagarMensagens() {
            if (confirm("Tem certeza que deseja apagar todas as mensagens?")) {
                fetch("apagar.php", { method: "POST" })
                    .then(res => res.text())
                    .then(data => {
                        document.getElementById("conteudo").textContent = "Nenhuma mensagem ainda.";
                        document.getElementById("status").textContent = data;
                        document.getElementById("status").style.color = "green";
                    })
                    .catch(err => {
                        document.getElementById("status").textContent = "Erro ao apagar.";
                        document.getElementById("status").style.color = "red";
                    });
            }
        }

        function carregarMensagens() {
            fetch("mensagens.php")
                .then(res => res.text())
                .then(data => {
                    document.getElementById("conteudo").textContent = data;
                });
        }
    </script>
        
    
    
</body>
</html>
