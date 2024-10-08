<?php  
session_start();
include_once('quadrado.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Cadastro de Quadrados</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">CRUD de Quadrados</h1>
        <h3 class="text-center text-red-500"><?= $msg ?></h3>
        
        <form action="quadrado.php" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            <fieldset>
                <legend class="font-semibold mb-2">Cadastro de Quadrado</legend>    
                <a href="../index.php" class="text-blue-600 hover:underline">Menu</a>    
                <fieldset class="mt-4">
                    <legend class="font-semibold mb-2">Dados do Quadrado</legend>        
                    <label for="id" class="block">Id:</label>
                    <input type="text" name="id" id="id" value="<?= isset($forma) ? $forma->getId() : 0 ?>" readonly class="border rounded p-2 w-full mb-2">
                    
                    <label for="lado" class="block">Lado:</label>
                    <input type="text" name="lado" id="lado" value="<?php if(isset($forma)) echo $forma->getLado() ?>" class="border rounded p-2 w-full mb-2">
                    
                    <label for="cor" class="block">Cor:</label>
                    <input type="color" name="cor" id="cor" value="<?php if(isset($forma)) echo $forma->getCor() ?>" class="border rounded p-2 w-full mb-2">                    
                    
                    <label for="un" class="block">Un:</label>
                    <select name="un" id="un" required class="border rounded p-2 w-full mb-2">
                        <option value="">Selecione</option>
                        <?php  
                            $uns = UnidadeMedida::listar();
                            foreach($uns as $un){ 
                                $str = "<option value='{$un->getId()}' ";
                                if(isset($forma)) 
                                    if ($forma->getUn()->getId() == $un->getId()) 
                                        $str .= " selected ";
                                $str .= ">{$un->getUn()}</option>";
                                echo $str;
                            }     
                        ?>
                    </select>
                    
                    <label for="fundo" class="block">Imagem de Fundo:</label>
                    <input type="file" name="fundo" id="fundo" class="border rounded p-2 w-full mb-2">
                    
                    <div class="flex justify-between mt-4">
                        <button type='submit' name='acao' value='salvar' class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600">Salvar</button>
                        <button type='submit' name='acao' value='excluir' class="bg-red-500 text-white rounded p-2 hover:bg-red-600">Excluir</button>
                        <button type='reset' class="bg-gray-300 text-black rounded p-2 hover:bg-gray-400">Cancelar</button>
                    </div>
                </fieldset>
            </fieldset>
        </form>
        <hr class="my-4">
    </div>
</body>
</html>