<?php  

include_once('unidademedida.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Cadastro de Unidade de Medida</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Cadastro de Unidade de Medida</h1>
        
        <form action="unidademedida.php" method="POST" class="bg-white p-6 rounded-lg shadow-lg mb-4">
            <label for="id" class="block">Id:</label>
            <input type="text" name="id" id="id" readonly value="<?= isset($unidade) ? $unidade->getId() : 0 ?>" class="border rounded p-2 w-full mb-4">
            
            <label for="un" class="block">Un:</label>
            <input type="text" name="un" id="un" value="<?= isset($unidade) ? $unidade->getUn() : '' ?>" class="border rounded p-2 w-full mb-4">
            
            <div class="flex justify-between mt-4">
                <button type='submit' name='acao' value='salvar' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Salvar</button>
                <button type='submit' name='acao' value='excluir' class="bg-red-500 text-white rounded p-2 hover:bg-red-600">Excluir</button>
                <button type='reset' class="bg-gray-300 text-black rounded p-2 hover:bg-gray-400">Cancelar</button>
            </div>
        </form>

        <!-- Formulário de Pesquisa -->
        <form action="" method="get" class="mb-6">
            <fieldset class="border p-5 rounded bg-white">
                <h1 class="font-semibold p-6 mb-4">Pesquisa</h1>
                <label for="busca" class="block">Busca:</label>
                <input type="text" name="busca" id="busca" value="" class="border rounded p-2 w-full mb-2">
                
                <label for="tipo" class="block">Tipo:</label>
                <select name="tipo" id="tipo" class="border rounded p-2 w-full mb-2">
                    <option value="">Escolha</option>
                    <option value="1">Id</option>
                    <option value="2">Un</option>
                </select>
                
                <button type='submit' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Buscar</button>
            </fieldset>
        </form>

        <hr class="my-4">
        
        <h2 class="text-xl font-bold mb-4">Lista de Unidades de Medida</h2>
        <a href="../index.php" class="text-blue-600 hover:underline mb-4">Menu</a>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded">
                <thead>
                    <tr>
                        <th class="border-b p-4">Id</th>
                        <th class="border-b p-4">Un</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach($lista as $unidade) { 
                        echo "<tr>
                                <td class='border-b p-4'><a href='index.php?id=".$unidade->getId()."' class='text-blue-600 hover:underline'>".$unidade->getId()."</a></td>
                                <td class='border-b p-4'>{$unidade->getUn()}</td>
                              </tr>";
                    }     
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>