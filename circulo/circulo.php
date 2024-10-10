<?php
require_once("../classes/Circulo.class.php");
require_once("../classes/UnidadeMedida.class.php");
require_once("../classes/Database.class.php");




$id = isset($_GET['id']) ? $_GET['id'] : 0;
$msg = isset($_GET['MSG']) ? $_GET['MSG'] : "";


if ($id > 0) {
    $circulo = Circulo::listar(1, $id)[0];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $raio = isset($_POST['raio']) ? $_POST['raio'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $un = isset($_POST['un']) ? $_POST['un'] : "";
    $arquivo =  isset($_FILES['fundo'])?$_FILES['fundo']:"";  
    $acao = isset($_POST['acao']) ? $_POST['acao'] : 0;
    $destino = "../".IMG."/".$arquivo['name'];


    try{
        $un = UnidadeMedida::listar(1,$un)[0];
        // var_dump($un);
        // die;
        $circulo = new Circulo($id,$raio,$cor,$un,$destino);
        //var_dump($circulo);


        $resultado = "";
        if($acao == 'Salvar'){
            if($id > 0){
                

                $resultado = $circulo->alterar();
            }
            else{              
                $resultado = $circulo->incluir();
            }
        }elseif ($acao == 'Excluir'){
            $resultado = $circulo->excluir();
        }
        $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
        move_uploaded_file($arquivo['tmp_name'],$destino);


    }catch(Exception $e){
        //echo "nhklgb";
        $_SESSION['MSG'] = $e->getMessage();
        //echo $_SESSION['MSG'];


    }finally{
        //echo "dvbcnhklgb";
        header('location: index.php');
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id =  isset($_GET['id'])?$_GET['id']:0;
    $msg = (isset($_SESSION['MSG'])?$_SESSION['MSG']:"");
    if ($msg != ""){
        echo "<h2>{$msg}</h2>";
        unset($_SESSION['MSG']);
    }


    $busca = isset($_GET['busca']) ? $_GET['busca'] : "";
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 0;
    $lista = Circulo::listar($tipo, $busca);
}


