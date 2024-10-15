<?php  
require_once("../classes/autoload.php");
require_once '../config/config.inc.php';
require_once("triangulo.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Triângulos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between mb-4">
            <div>
                <a href="cadastro.php" class="text-blue-600 hover:underline">Novo Triângulo</a>
                <a href="../unidademedida/index.php" class="text-blue-600 hover:underline">Unidade de Medida</a>
                <a href="../circulo/index.php" class="text-blue-600 hover:underline">Círculo</a>
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>
            </div>
        </div>
        <div class="bg-white border p-4 rounded">
        <h1 class="text-2xl font-bold mb-4 text-center">CRUD de Triângulos</h1>
        <h3 class="text-red-500 mb-4 text-center"><?= isset($msg) ? $msg : ''; ?></h3>
        <form action="triangulo.php" method="post" enctype="multipart/form-data">
            <fieldset class="mb-4">
                <legend class="font-semibold text-lg">Cadastro de Triângulo</legend>    
            </fieldset>
            <fieldset class="mb-4">
                <legend class="font-semibold">Dados do Triângulo</legend>        
                <label for="id" class="block">Id:</label>
                <input type="text" name="id" id="id" value="<?= isset($triangulo) ? $triangulo->getId() : 0; ?>" readonly class="border rounded p-2 w-full mb-2">

                <label for="lado1" class="block">Lado 1:</label>
                <input type="text" name="lado1" id="lado1" value="<?= isset($triangulo) ? $triangulo->getLado1() : ''; ?>" class="border rounded p-2 w-full mb-2">

                <label for="lado2" class="block">Lado 2:</label>
                <input type="text" name="lado2" id="lado2" value="<?= isset($triangulo) ? $triangulo->getLado2() : ''; ?>" class="border rounded p-2 w-full mb-2">

                <label for="lado3" class="block">Lado 3:</label>
                <input type="text" name="lado3" id="lado3" value="<?= isset($triangulo) ? $triangulo->getLado3() : ''; ?>" class="border rounded p-2 w-full mb-2">

                <label for="cor" class="block">Cor:</label>
                <input type="color" name="cor" id="cor" value="<?= isset($triangulo) ? $triangulo->getCor() : ''; ?>" class="border rounded p-2 w-full mb-12">

                <label for="un" class="block">Unidade de Medida:</label>
                <select name="un" id="un" required class="border rounded p-2 w-full mb-2">
                    <option value="">Selecione</option>
                    <?php  
                        $uns = UnidadeMedida::listar();
                        foreach($uns as $un){ 
                            $str = "<option value='{$un->getId()}' ";
                            if(isset($triangulo) && $triangulo->getUn()->getId() == $un->getId()) 
                                $str .= " selected ";
                            $str .= ">{$un->getUn()}</option>";
                            echo $str;
                        }     
                    ?>
                </select>

                <label for="fundo" class="block">Imagem de Fundo:</label>
                <input type="file" name="fundo" id="fundo" class="border rounded p-2 w-full mb-4">

                <div class="flex justify-between">
                    <button type='submit' name='acao' value='salvar' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Salvar</button>
                    <button type='submit' name='acao' value='excluir' class="bg-red-500 text-white rounded p-2 hover:bg-red-600">Excluir</button>
                    <button type='reset' class="bg-gray-300 text-black rounded p-2 hover:bg-gray-400">Cancelar</button>
                </div>
            </fieldset>
        </form>
    </div>

        <!-- Formulário de pesquisa -->
        <form action="" method="get" class="mb-4">
            <fieldset class="border p-4 rounded bg-white">
                <h3 class="font-semibold">Pesquisa</h3>
                <label for="busca" class="block">Busca:</label>
                <input type="text" name="busca" id="busca" value="<?= htmlspecialchars($busca) ?>" class="border rounded p-2 w-full mb-2">
                <label for="tipo" class="block">Tipo:</label>
                <select name="tipo" id="tipo" class="border rounded p-2 w-full mb-2">
                    <option value="0">Escolha</option>
                    <option value="1">Id</option>
                    <option value="2">Lado A</option>
                    <option value="3">Lado B</option>
                    <option value="4">Lado C</option>
                    <option value="5">Cor</option>
                    <option value="6">Tipo</option>
                </select>
                <button type='submit' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Buscar</button>
            </fieldset>
        </form>

        <hr class="my-4">

        <h1 class="text-2xl font-bold mb-4">Lista de Triângulos</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded">
                <thead>
                    <tr>
                        <th class="border-b p-4">Id</th>
                        <th class="border-b p-4">Lado A</th>
                        <th class="border-b p-4">Lado B</th>
                        <th class="border-b p-4">Lado C</th>
                        <th class="border-b p-4">Cor</th>
                        <th class="border-b p-4">Tipo</th>
                        <th class="border-b p-4">Un</th>
                        <th class="border-b p-4">Area</th>
                        <th class="border-b p-4">Perimetro</th>
                        <th class="border-b p-4">Triangulo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($lista as $triangulo) {
                    echo "<tr>
                             <td><a href='index.php?id=" . $triangulo->getId() . "' class='text-pink-400 hover:text-purple-500'>" . $triangulo->getId() . "</a></td>
                             <td>" . $triangulo->getLado1() . "</td>
                             <td>" . $triangulo->getLado2() . "</td>
                             <td>" . $triangulo->getLado3() . "</td>
                             <td>" . $triangulo->getCor() . "</td>
                             <td>" . $triangulo->getTipo() . "</td>
                             <td>" . $triangulo->getUn()->getUn() . "</td>
                             <td>" . $triangulo->calcularPerimetro($triangulo) . $triangulo->getUn()->getUn() . "</td>
                             <td>" . $triangulo->calcularArea($triangulo) . $triangulo->getUn()->getUn() . "²</td>
                             <td><a href='index.php?id=" . $triangulo->getId() . "' class='text-pink-400 hover:text-purple-500'>" . $triangulo->desenhar($triangulo) . " </a></td>
                        </tr>";
                }
?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>