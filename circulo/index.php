<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <?php
    session_start();
    require_once("../classes/autoload.php");
    require_once '../config/config.inc.php';
    include_once('circulo.php');
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-5">
    <form method="get" class="bg-white p-5 rounded-lg shadow-md mb-5">
    <a href="../index.php" class="text-blue-600 hover:underline mb-4 inline-block">Menu</a>
    <a href="./cadastro.php" class="text-blue-600 hover:underline mb-4 inline-block">Novo Circulo</a>
        <h4 class="text-lg font-semibold mb-2">Busca</h4>
        <div class="mb-3">
            <input type="text" name="busca" id="busca" placeholder="Busca" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-3">
            <select name="tipo" id="tipo" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="1">ID</option>
                <option value="2">Raio</option>
                <option value="3">Cor</option>
                <option value="4">Unidade</option>
            </select>
        </div>
        <input type="submit" name="acao" id="acao" value="Buscar" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-green-600 transition duration-200">
    </form>

    <h2 class="text-2xl font-bold mb-4">Lista de Círculos</h2>
    <div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b">Id</th>
                    <th class="py-2 px-4 border-b">Raio</th>
                    <th class="py-2 px-4 border-b">Cor</th>
                    <th class="py-2 px-4 border-b">Unidade</th>
                    <th class="py-2 px-4 border-b">Perímetro</th>
                    <th class="py-2 px-4 border-b">Área</th>
                    <th class="py-2 px-4 border-b">Círculos</th>
                    <th class="py-2 px-4 border-b">Visualizar</th>
                    <th class="py-2 px-4 border-b">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $circulo) {
                    echo "<tr class='hover:bg-gray-100'>
                        <td class='py-2 px-4 border-b'><a href='index.php?id=" . $circulo->getId() . "'>" . $circulo->getId() . "</a></td>
                        <td class='py-2 px-4 border-b'>" . $circulo->getRaio() . "</td>
                        <td class='py-2 px-4 border-b'>" . $circulo->getCor() . "</td>
                        <td class='py-2 px-4 border-b'>" . $circulo->getUn()->getUn() . "</td>
                        <td class='py-2 px-4 border-b'>" . $circulo->calcularPerimetro() . " " . $circulo->getUn()->getUn() . "</td>
                        <td class='py-2 px-4 border-b'>" . $circulo->calcularArea() . " " . $circulo->getUn()->getUn() . "</td>
                        <td class='py-2 px-4 border-b'><div class='inline-block w-5 h-5 rounded-full' style='background-color: " . $circulo->getCor() . "; background-image: url(\"{$circulo->getFundo()}\")'></div></td>
                        <td class='py-2 px-4 border-b'><a href='consulta.php?id={$circulo->getId()}' class='text-blue-600 hover:underline'>Visualizar</a></td>
                        <td class='py-2 px-4 border-b'><a href='cadastro.php?id={$circulo->getId()}' class='text-blue-600 hover:underline'>Editar</a></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>