<?php
require_once("../classes/autoload.php");

class Equilatero extends Triangulo
{
    public function __construct($id = 0, $lado1 = 0, $lado2 = 0, $lado3 = 0, $tipo = "", $cor = "black", UnidadeMedida $un = null, $fundo = null)
    {
        parent::__construct($id, $lado1, $lado2, $lado3, $tipo, $cor, $un, $fundo);
    }

    public function incluir()
    {
        $sql = 'INSERT INTO triangulo (lado1, lado2, lado3, tipo, cor, id_un, fundo)   
                VALUES (:lado1, :lado2, :lado3, :tipo, :cor, :un, :fundo)';

        $parametros = array(':lado1' => $this->getLado1(), 
                            ':lado2' => $this->getLado2(), 
                            ':lado3' => $this->getLado3(), 
                            ':tipo' => $this->getTipo(), 
                            ':cor' => parent::getCor(), 
                            ':un' => parent::getUn()->getId(),
                            ':fundo' => parent::getFundo());
        return Database::executar($sql, $parametros);
    }

    public function excluir() {
        $sql = 'DELETE 
                FROM triangulo 
                WHERE id = :id';
        $parametros = array(':id'=> $this->getId());
        return Database::executar($sql, $parametros);
    }

    public function alterar() { 
        $sql = 'UPDATE triangulo
                SET lado1 = :lado1, lado2 = :lado2, lado3 = :lado3, tipo= :tipo, cor = :cor, id_un = :un, fundo = :fundo
                WHERE id = :id';
        $parametros = array(':lado1' => parent::getLado1(),
                            ':lado2' => parent::getLado2(),
                            ':lado3' => parent::getLado3(),
                            ':tipo' => parent::getTipo(),
                            ':cor' => parent::getCor(), 
                            ':un' => parent::getUn()->getId(), 
                            ':id' => parent::getId(),
                            ':fundo' => parent::getFundo());
        return Database::executar($sql, $parametros);
        //return var_dump($parametros);
    }
    public static function listar($tipo = 0, $busca = ""): array {
        
        $sql = "SELECT * FROM triangulo";
        if ($tipo > 0) {
            switch ($tipo) {
                case 1:
                    $sql .= " WHERE id = :busca";
                    break;
                case 2:
                    $sql .= " WHERE lado1 LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 3:
                    $sql .= " WHERE lado2 LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 4:
                    $sql .= " WHERE lado3 LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 5:
                    $sql .= " WHERE tipo LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 6:
                    $sql .= " WHERE cor LIKE :busca";
                    $busca = "%{$busca}%";
                    break;
                case 7:
                    $sql .= " INNER JOIN un ON (unidademedida.id = triangulo.id_un) WHERE unidademedida.id LIKE :busca";
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
            $triangulo = new Equilatero($forma['id'], $forma['lado1'], $forma['lado2'], $forma['lado3'], $forma['tipo'], $forma['cor'], $un, $forma['fundo']);
            array_push($formas, $triangulo);
        }
        return $formas;
    }

    public function desenhar()
    {
        $lado = $this->getLado1();
        $base = $this->getLado3();
        $un = $this->getUn()->getUn();
        return "
            <div style='position: relative; display: inline-block;'>
                <div style='
                    width: 0;
                    height: 0;
                    border-left: " . $lado . "$un solid transparent;
                    border-right: " . $lado .  "$un solid transparent;
                    border-bottom: " . $base . "$un solid " . $this->getCor() . ";
                    position: relative;
                '>
                    <div style='
                        position: absolute;
                        top: 0;
                        left: 50%;
                        transform: translateX(-50%);
                        width: " . ( 2 * $lado) . "$un;
                        height: " . $base . "$un;
                        background-image: url(" . '"' . $this->getFundo() . '"' . ");
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
                        pointer-events: none;
                    '></div>
                </div>
            </div>";
    }


    public function calcularArea()
    {
        $p = $this->getLado1() + $this->getLado2() + $this->getLado3();
        $a = sqrt($p * ($p - $this->getLado1()) * ($p - $this->getLado2()) * ($p - $this->getLado3()));
        $area = number_format($a, 2);
        return $area;
    }
    
    public function calcularPerimetro(){
        $perimetro = $this->getLado1() + $this->getLado2() + $this->getLado3();
        return $perimetro;
    }
}
?>
