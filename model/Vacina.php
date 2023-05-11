<?php
require_once ("../infra/Database.php");

class Vacina
{
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

        $sql = "INSERT INTO usuario(nome, sobrenome, email, login, senha) 
                VALUES (:nome, :sobrenome, :email, :login, :senha)";
        
        $st = $con->prepare($sql);
        $st->bindParam(':nome', $this->nome);
        $st->bindParam(':sobrenome', $this->sobrenome);
        $st->bindParam(':email', $this->email);
        $st->bindParam(':login', $this->login);
        $st->bindParam(':senha', $this->senha);
	    $status = $st->execute();

        $idUsuario = $con->lastInsertId();

        if ($status == true){
            return true;
        }

    }


    public function buscarPorId($id)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT id, nome, sobrenome, email, login FROM usuario WHERE id = :id";
        $st = $con->prepare($sql);
        $st->bindParam(':id', $id);

        $dados = $st->execute();

        $db->close();
        return $dados;
    }


    /* TESTANDO */
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
