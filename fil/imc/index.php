<?php
$resultado = "";
$imc = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = floatval($_POST["peso"]);
    $altura = floatval($_POST["altura"]);

    if ($peso > 0 && $altura > 0) {
        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 2);

        if ($imc < 18.5) {
            $resultado = "Abaixo do peso";
        } elseif ($imc < 24.9) {
            $resultado = "Peso normal";
        } elseif ($imc < 29.9) {
            $resultado = "Sobrepeso";
        } elseif ($imc < 34.9) {
            $resultado = "Obesidade Grau I";
        } elseif ($imc < 39.9) {
            $resultado = "Obesidade Grau II";
        } else {
            $resultado = "Obesidade Grau III (mórbida)";
        }
    } else {
        $resultado = "Preencha os valores corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #85E788;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;

            
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .voltar {
            margin-top: 20px;
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

        .resultado {
            text-align: center;
            margin-top: 20px;
        }

        .resultado h3 {
            color: #333;
        }

        .resultado p {
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de IMC</h2>
        <form method="POST" action="">
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" id="peso" step="0.01" required>

            <label for="altura">Altura (m):</label>
            <input type="number" name="altura" id="altura" step="0.01" required>

            <button type="submit">Calcular</button>
        </form>

        <form action="../index.html" method="get">
            <button class = voltar type="submit">Voltar</button>
        </form>

        <?php if ($resultado !== ""): ?>
        <div class="resultado">
            <h3>Seu IMC: <?php echo $imc; ?></h3>
            <p>Classificação: <?php echo $resultado; ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
