<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Consulta</title>
    <?php
    session_start();
    include_once('circulo.php');

    ?>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="flex justify-between mb-4">
            <div>
                <a href="./cadastro.php" class="text-blue-600 hover:underline">Novo Círculo</a>
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>
            </div>
        </div>

        <form method="get" class="mb-4 bg-white p-6 rounded-lg shadow-md">
            <h4 class="font-bold mb-2">Busca</h4>
            <div class="mb-4">
                <input type="text" class="border rounded p-2 w-full" name="busca" id="busca" placeholder="Busca">
            </div>
            <div class="mb-4">
                <select class="border rounded p-2 w-full" name="tipo" id="tipo">
                    <option value="1">ID</option>
                    <option value="2">Raio</option>
                    <option value="3">Cor</option>
                    <option value="4">Unidade</option>
                </select>
            </div>
            <input type="submit" name="acao" id="acao" value="Buscar" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">
        </form>

        <h2 class="text-2xl font-bold mb-4">Lista de Círculos</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border-b p-4">Id</th>
                        <th class="border-b p-4">Raio</th>
                        <th class="border-b p-4">Cor</th>
                        <th class="border-b p-4">Unidade</th>
                        <th class="border-b p-4">Perímetro</th>
                        <th class="border-b p-4">Área</th>
                        <th class="border-b p-4">Círculos</th>
                        <th class="border-b p-4">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $circulo) {
                        echo "<tr>
                            <td class='border-b p-4'><a href='index.php?id=" . $circulo->getId() . "' class='text-blue-600 hover:underline'>" . $circulo->getId() . "</a></td>
                            <td class='border-b p-4'>" . $circulo->getRaio() . "</td>
                            <td class='border-b p-4'>" . $circulo->getCor() . "</td>
                            <td class='border-b p-4'>" . $circulo->getUn()->getUn() . "</td>
                            <td class='border-b p-4'>" . $circulo->calcularPerimetro() . " " . $circulo->getUn()->getUn() . "</td>
                            <td class='border-b p-4'>" . $circulo->calcularArea() . " " . $circulo->getUn()->getUn() . "²</td>
                            <td class='border-b p-4'><a href='index.php?id=" . $circulo->getId() . "' class='text-blue-600 hover:underline'>" . $circulo->desenhar($circulo) . "</a></td>
                            <td class='border-b p-4'><a href='cadastro.php?id={$circulo->getId()}' class='text-blue-600 hover:underline'>Editar</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>