<?php
$tarefas = [];

// Lê tarefas do arquivo se ele existir
if (file_exists("tarefas.txt")) {
    $tarefas = file("tarefas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $novaTarefa = trim($_POST["tarefa"]);

    if (!empty($novaTarefa)) {
        // Protege contra código malicioso
        $novaTarefa = htmlspecialchars($novaTarefa, ENT_QUOTES, 'UTF-8');
        // Salva no arquivo
        file_put_contents("tarefas.txt", $novaTarefa . "\n", FILE_APPEND);
        // Redireciona para evitar reenvio
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <style>
        /* Estilo do corpo da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #85E788; /* Verde suave */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #2c6b2f;
        }

        /* Estilo do container */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #2c6b2f;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            padding: 12px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #388e3c;
        }

        .voltar {
            width: 100%;
            padding: 14px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .voltar:hover {
            background-color: #d32f2f;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f0f8f0;
            margin: 8px 0;
            padding: 12px;
            border-radius: 5px;
            color: #2c6b2f;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Minha Lista de Tarefas</h2>

        <!-- Formulário para nova tarefa -->
        <form method="POST" action="index.php">
            <input type="text" name="tarefa" required placeholder="Digite uma nova tarefa">
            <button type="submit">Adicionar</button>
        </form>

        <h3>Tarefas:</h3>
        <ul>
            <?php if (count($tarefas) > 0): ?>
                <?php foreach ($tarefas as $t): ?>
                    <li><?php echo $t; ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhuma tarefa adicionada ainda.</li>
            <?php endif; ?>
        </ul>

        <form action="exclude.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir todas as tarefas?');">
            <button type="submit" class="voltar" ;>Excluir Todas as Tarefas</button>
        </form>

        <form action="../index.html" method="get">
            <button class = voltar type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>
