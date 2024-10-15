<?php
   require_once("../classes/autoload.php");
   require_once '../config/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Consulta de Forma</title>
    <style>
        .modal{
            width:1024px;
            height: 1024px;
            
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg min-w-full border rounded">
        <?php
            $id = isset($_GET['id']) ? $_GET['id'] : 0; 
        
            if ($id > 0) {
                $forma = Quadrado::listar(1, $id)[0];                                          
            ?>
                <h1 class="text-2xl font-bold mb-4 text-center">Detalhes do Quadrado</h1>
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">Descrição:</h2>
                    <div class="border rounded p-4 bg-gray-50">
                        <?= $forma->desenhar(); ?>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="font-semibold"><strong>ID:</strong> <?= $forma->getId() ?></p>
                    <p class="font-semibold"><strong>Lado:</strong> <?= $forma->getLado() ?></p>
                    <p class="font-semibold"><strong>Cor:</strong> <span style="color: <?= $forma->getCor() ?>;"><?= $forma->getCor() ?></span></p>
                    <p class="font-semibold"><strong>Unidade:</strong> <?= $forma->getUn()->getUn() ?></p>
                </div>
            <?php
            } else {
                echo "<p class='text-red-500'>Forma não encontrada.</p>";
            }
        ?>
        <div class="flex justify-center mt-4">
            <a href="../index.php" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>