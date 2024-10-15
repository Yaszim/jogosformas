<?php
    require_once("../classes/autoload.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Consulta de circulo</title>
    <style>
        .modal{
            width:1024px;
            height: 1024px;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
    <a href="../index.php" class="text-blue-600 hover:underline mb-4 inline-block">Menu</a>
        <?php
            $id = isset($_GET['id']) ? $_GET['id'] : 0; 
        
            if ($id > 0) {
                $circulo = Circulo::listar(1, $id)[0];                                          
                ?>
                <h1 class="text-2xl font-bold mb-4 text-center">Detalhes do Círculo</h1>
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">Descrição:</h2>
                    <div class="border rounded p-4 bg-gray-50">
                        <?= $circulo->desenhar(); ?>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="font-semibold"><strong>ID:</strong> <?= $circulo->getId() ?></p>
                    <p class="font-semibold"><strong>Raio:</strong> <?= $circulo->getRaio() ?></p>
                    <p class="font-semibold"><strong>Cor:</strong> <span style="color: <?= $circulo->getCor() ?>;"><?= $circulo->getCor() ?></span></p>
                    <p class="font-semibold"><strong>Unidade:</strong> <?= $circulo->getUn()->getUn() ?></p>
                </div>
                <div class="flex justify-center">
                    <a href="../index.php" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Voltar ao Menu</a>
                    <a href="./cadastro.php" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Cadastrar novo circulo</a>
                </div>
                <?php
            } else {
                echo "<p class='text-red-500 text-center'>Círculo não encontrado.</p>";
            }
        ?>
    </div>
</body>
</html>