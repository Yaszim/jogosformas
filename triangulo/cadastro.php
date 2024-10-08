<?php  

include_once('triangulo.php'); // Inclua a classe Triangulo
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Triângulos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">CRUD de Triângulos</h1>
        <h3 class="text-red-500 mb-4 text-center"><?= isset($msg) ? $msg : ''; ?></h3>
        <form action="triangulo.php" method="post" enctype="multipart/form-data">
            <fieldset class="mb-4">
                <legend class="font-semibold text-lg">Cadastro de Triângulo</legend>    
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>
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

                <label for="cor" class="block mb-4">Cor:</label>
                <input type="color" name="cor" id="cor" value="<?= isset($triangulo) ? $triangulo->getCor() : ''; ?>" class="border rounded p-2 w-full mb-2">

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
</body>
</html>