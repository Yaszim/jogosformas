<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
    include_once('circulo.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Formulário de Criação de Formas</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <a href="../index.php" class="text-blue-600 hover:underline mb-4 inline-block">Menu</a>

        <form action="circulo.php" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            <input type="hidden" name="id" id="id" value="<?= $id ? $circulo->getId() : 0 ?>" readonly>

            <label class="block mb-2" for="raio">Raio</label>
            <input type="number" class="border rounded p-2 w-full mb-4" name="raio" id="raio" value="<?= $id ? $circulo->getRaio() : 0 ?>" placeholder="Raio do seu círculo">

            <label class="block mb-2" for="cor">Cor</label>
            <input type="color" class="border rounded p-2 w-full mb-4" name="cor" id="cor" value="<?= $id ? $circulo->getCor() : 'black' ?>">

            <label class="block mb-2" for="unidade">Unidade</label>
            <select class="border rounded p-2 w-full mb-4" name="un" id="un">
                <?php
                    $uns = UnidadeMedida::listar();
                    foreach ($uns as $un) {
                        $str = "<option value='{$un->getId()}'";
                        if (isset($circulo) && $circulo->getUn()->getId() == $un->getId()) {
                            $str .= " selected";
                        }
                        $str .= ">{$un->getUn()}</option>";
                        echo $str;
                    }
                ?>
            </select>

            <label class="block mb-2" for="fundo">Imagem de Fundo:</label>
            <input type="file" name="fundo" id="fundo" class="border rounded p-2 w-full mb-4">

            <div class="flex justify-between mt-4">
                <input type="submit" name="acao" id="acao" value="Salvar" class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">
             
                <input type="submit" name="acao" id="acao" value="Excluir" class="bg-red-500 text-white rounded p-2 hover:bg-red-600">
            </div>
        </form>
    </div>
</body>
</html>