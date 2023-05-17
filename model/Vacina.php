<?php
require_once ("../infra/Database.php");

class Vacina
{
    private $id;
    private $nomevacina;
    private $local;
    private $fabricante;
    private $funcao_vacina;


    public function __set($atributo, $valor)
    {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }

    public function salvar(){
        $db = new Database();
        $con = $db->connect();

        $sql = "INSERT INTO vacinas(nomevacina, local, fabricante, funcao_vacina) 
                VALUES (:nomevacina, :local, :fabricante, :funcao_vacina)";
        
        $st = $con->prepare($sql);
        $st->bindParam(':nomevacina', $this->nomevacina);
        $st->bindParam(':local', $this->local);
        $st->bindParam(':fabricante', $this->fabricante);
        $st->bindParam(':funcao_vacina', $this->funcao_vacina);
	    $status = $st->execute();

        $idVacinas = $con->lastInsertId();

        if ($status == true){
            return true;
        }

    }


    public function buscarPorId($id)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT id, nomevacina, local, fabricante, funcao_vacina FROM vacinas WHERE id = :id";
        $st = $con->prepare($sql);
        $st->bindParam(':id', $id);

        $resultado = $st->execute();

        $dados = $st->fetchAll();
        $db->close();
        return $dados;
    }


    

    public function deletar($id)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "DELETE FROM vacinas WHERE id = :id";
        $st = $con->prepare($sql);
        $st->bindParam(':id', $id);

        $status = $st->execute();

        $db->close();
        return  true;
    }


    public function listarVacinas($pagina = null, $contador = 100)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT id, nomevacina, local, fabricante, funcao_vacina FROM vacinas limit $contador";
        $rs = $con->query($sql);

        $status = $rs->execute();
        $dados = $rs->fetchAll();

        $db->close();
        return $dados;
    }

    public function atualizar(){
        $db = new Database();
        $con = $db->connect();

        $sql = "UPDATE vacinas set nomevacina = :nomevacina, local = :local, fabricante = :fabricante, 
                    funcao_vacina = :funcao_vacina WHERE id = :id";
        
        $st = $con->prepare($sql);
        $st->bindParam(':nomevacina', $this->nomevacina);
        $st->bindParam(':local', $this->local);
        $st->bindParam(':fabricante', $this->fabricante);
        $st->bindParam(':funcao_vacina', $this->funcao_vacina);
        $st->bindParam(':id', $this->id);
	    
        $status = $st->execute();
        

        if ($status == true){
            return true;
        }
        else{
            return false;
        }

    }


    public function autenticar($login, $senha)
    {
        $senha_cripto = hash("sha3-256", $senha);
        $database = new Database();
        $con = $database->connect();

        $sql = "SELECT id, login FROM usuario WHERE login = :login AND senha = :senha";

        $st = $con->prepare($sql);
        $st->bindParam(':login', $login);
        $st->bindParam(':senha', $senha_cripto);
        $retorno = $st->execute();
        $dados = $st->fetchAll();

        if (sizeof($dados) == 1){
            return true;
        }
        else{
            return false;
        }
    }
}
