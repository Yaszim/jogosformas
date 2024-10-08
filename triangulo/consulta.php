<?php
require_once("../classes/Database.class.php");
require_once("../classes/Triangulo.class.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Detalhes do Triângulo</title>
    <style>

        .triangulo {
            display: block;
            margin: 30px auto;
        }
        .details {
            margin: 20px;
            padding: 10px;
            border: 5px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between">
            <div>
                <a href="cadastro.php" class="text-blue-600 hover:underline">Novo Triângulo</a>
                <a href="../unidademedida/index.php" class="text-blue-600 hover:underline">Unidade de Medida</a>
                <a href="../circulo/index.php" class="text-blue-600 hover:underline">Círculo</a>
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg min-w-full border rounded">
            <h1 class=" font-bold mb-4">Detalhes do Triângulo</h1>

            <div class="mb-4">
                <p class="font-semibold"><strong>Lado A:</strong> <?= $forma->getLadoA() ?></p>
                <p class="font-semibold"><strong>Lado B:</strong> <?= $forma->getLadoB() ?></p>
                <p class="font-semibold"><strong>Lado C:</strong> <?= $forma->getLadoC() ?></p>
                <p class="font-semibold"><strong>Cor:</strong> <span style="color: <?= $forma->getCor() ?>;"><?= $forma->getCor() ?></span></p>
                <p class="font-semibold"><strong>Unidade:</strong> <?= $forma->getUn()->getUn() ?></p>

                <!-- Exibe os ângulos, área e perímetro -->
                <p class="font-semibold"><strong>Ângulo A:</strong> <?= number_format($forma->getAnguloA(), 2) ?>°</p>
                <p class="font-semibold"><strong>Ângulo B:</strong> <?= number_format($forma->getAnguloB(), 2) ?>°</p>
                <p class="font-semibold"><strong>Ângulo C:</strong> <?= number_format($forma->getAnguloC(), 2) ?>°</p>
                <p class="font-semibold"><strong>Área:</strong> <?= number_format($forma->getArea(), 2) ?> <?= $forma->getUn()->getUn() ?>²</p>
                <p class="font-semibold"><strong>Perímetro:</strong> <?= number_format($forma->getPerimetro(), 2) ?> <?= $forma->getUn()->getUn() ?></p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Desenho do Triângulo</h2>
                <div class="border rounded p-4 bg-gray-50">
                    <?= $forma->desenhar(); ?>
                </div>
            </div>

            <div class="flex justify-start">
                <a href="cadastro.php" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Cadastrar Novo Triângulo</a>
            </div>
        </div>
    </div>
</body>
</html>