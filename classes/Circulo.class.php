<?php
require_once("../classes/Database.class.php");
require_once("../classes/Formas.class.php");
require_once("../classes/UnidadeMedida.class.php");

class Circulo extends Formas
{
    private $raio;

    public function  __construct($id = 0, $raio = 1, $cor = "black", UnidadeMedida $un = null, $fundo = "null")
    {
        parent::__construct($id, $cor, $un, $fundo);
        $this->setRaio($raio);
    } 

    public function setRaio($raio)
    {
        if ($raio < 1)
            throw new Exception("Erro, raio indefinido");
        else
            $this->raio = $raio;
    }

    public function getRaio()
    {
        return $this->raio;
    }

    public function incluir()
    {
        $sql = 'INSERT INTO circulo (raio, cor, id_un, fundo)   
                VALUES (:raio, :cor, :un, :fundo)';

        $parametros = array(':raio' => $this->raio, 
                            ':cor' => parent::getCor(), 
                            ':un' => parent::getUn()->getId(),
                            ':fundo' => parent::getFundo());
        return Database::executar($sql, $parametros);
    }

    public function excluir()
    {
        $sql = 'DELETE 
                FROM circulo 
                WHERE id = :id';
        $parametros = array(':id'=> $this->getId());
        return Database::executar($sql, $parametros);
    }

    public function alterar()
    {
        $sql = 'UPDATE circulo
                SET raio = :raio, cor = :cor, un_id = :un, id = :id, fundo = :fundo
                WHERE id_circulo = :id';
        $parametros = array(':raio' => $this->raio, 
                            ':cor' => parent::getCor(), 
                            ':un' => parent::getUn()->getId(), 
                            ':id' => parent::getId(),
                            ':fundo' => parent::getFundo());
        return Database::executar($sql, $parametros);
        //return var_dump($parametros);
    }

    public static function listar($tipo = 0, $busca = ""):array
    {
        $sql = "SELECT * FROM circulo";
        if ($tipo > 0) {
            switch ($tipo) {
                case 1:
                    $sql .= " WHERE id = :busca";
                    break;
                case 2:
                    $sql .= " WHERE raio LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 3:
                    $sql .= " WHERE cor LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 4:
                    $sql .= " INNER JOIN un ON (unidademedida.un_id = quadrado.un_id) WHERE formas.unidademedida LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 5:
                    $sql .= " WHERE fundo LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
            }
        }
        // $comando = $conexao->prepare($sql);
        $parametros = [];
        if ($tipo > 0)
            $parametros = array(':busca' => $busca);

        $comando = Database::executar($sql, $parametros);
        $formas = array();

        while ($forma = $comando->fetch(PDO::FETCH_ASSOC)) {
            $un = UnidadeMedida :: listar(1,$forma['id_un'])[0]; 
            $circulo = new Circulo($forma['id'], $forma['raio'], $forma['cor'], $un, $forma['fundo']);
            array_push($formas, $circulo);
        }
        return $formas;
    }

    public function desenhar()
    {
        $diametro = $this->getRaio()*2;
        return "<div class='circulo' style='display:block; 
                width:{$diametro}{$this->getUn()->getUn()};
                height:{$diametro}{$this->getUn()->getUn()};
                background-color:{$this->getCor()};
                background-image:url(\"{$this->getFundo()}\");background-size:contain; border-radius:50%'></div>";
    }

    public function calcularArea()
    {
        $area = $this->getRaio() * $this->getRaio() * 3.14;
        return $area;
    }

    public function calcularPerimetro()
    {
        $perimetro = $this->getRaio() * 2 * 3.14;
        return $perimetro;
    }

}
