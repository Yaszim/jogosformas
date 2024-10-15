<?php  
session_start();
require_once("../classes/autoload.php");
require_once '../config/config.inc.php';
include_once('quadrado.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Formas</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between mb-4">
            <div>
                <a href="./cadastro.php" class="text-blue-600 hover:underline">Novo Quadrado</a>
                <a href="../unidademedida/index.php" class="text-blue-600 hover:underline">Unidade de Medida</a>
                <a href="../circulo/index.php" class="text-blue-600 hover:underline">Círculo</a>
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>
            </div>
        </div>

        <!-- Formulário de Pesquisa -->
        <form action="" method="get" class="mb-4">
            <fieldset class="border p-4 rounded bg-white">
                <legend class="font-semibold">Pesquisa</legend>
                <label for="busca" class="block">Busca:</label>
                <input type="text" name="busca" id="busca" value="" class="border rounded p-2 w-full mb-2">
                
                <label for="tipo" class="block">Tipo:</label>
                <select name="tipo" id="tipo" class="border rounded p-2 w-full mb-2">
                    <option value="0">Escolha</option>
                    <option value="1">Id</option>
                    <option value="2">Lado</option>
                    <option value="3">Cor</option>
                    <option value="4">Un</option>
                </select>
                
                <button type='submit' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Buscar</button>
            </fieldset>
        </form>

        <hr class="my-4">
        
        <h1 class="text-2xl font-bold mb-4">Lista de Quadrados</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded">
                <thead>
                    <tr>
                        <th class="border-b p-4">Id</th>
                        <th class="border-b p-4">Tamanho</th>
                        <th class="border-b p-4">Cor</th>
                        <th class="border-b p-4">Un</th>
                        <th class="border-b p-4">Visualizar</th>
                        <th class="border-b p-4">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach($lista as $forma) {
                        echo "<tr>
                                <td class='border-b p-4'>{$forma->getId()}</td>
                                <td class='border-b p-4'>{$forma->getLado()}</td>
                                <td class='border-b p-4' style='color: {$forma->getCor()}'>{$forma->getCor()}</td>
                                <td class='border-b p-4'>{$forma->getUn()->getUn()}</td>
                                <td class='py-2 px-4 border-b'><div class='inline-block w-5 h-5 rounded-full' style='background-color: " . $forma->getCor() . "; background-image: url(\"{$forma->getFundo()}\")'></div></td>
                                <td class='border-b p-4'><a href='consulta.php?id={$forma->getId()}' class='text-blue-600 hover:underline'>Visualizar</a></td>
                                <td class='border-b p-4'><a href='cadastro.php?id={$forma->getId()}' class='text-blue-600 hover:underline'>Editar</a></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>