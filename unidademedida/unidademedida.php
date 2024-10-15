<?php

require_once("../classes/autoload.php");
require_once '../config/config.inc.php';


$id =  isset($_GET['id'])?$_GET['id']:0;
$msg =  isset($_GET['MSG'])?$_GET['MSG']:"";

if ($id > 0){
    $unidade = UnidadeMedida::listar(1,$id)[0]; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id =  isset($_POST['id'])?$_POST['id']:0; 
    $un =  isset($_POST['un'])?$_POST['un']:""; 
    $acao =  isset($_POST['acao'])?$_POST['acao']:0; 
    
    try{
        $unidade = new UnidadeMedida($id,$un);

        $resultado = "";
        if($acao == 'salvar'){
            if($id > 0)
                $resultado = $unidade->alterar();
            else                       
                $resultado = $unidade->incluir();
        }elseif ($acao == 'excluir'){
            $resultado = $unidade->excluir();
        }
        $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
        move_uploaded_file($arquivo['tmp_name'],$destino);

    }catch(Exception $e){ 
        $_SESSION['MSG'] = $e->getMessage();

    }finally{
         header('location: index.php');
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){ 
    $busca =  isset($_GET['busca'])?$_GET['busca']:0; 
    $tipo =  isset($_GET['tipo'])?$_GET['tipo']:0;
    $lista = UnidadeMedida::listar($tipo,$busca); 
}
