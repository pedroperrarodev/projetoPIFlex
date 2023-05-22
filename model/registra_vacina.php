<?php

    require_once("../infra/database.php");

    class registraVacina{

        private $id_registro_vacina;
        private $id_vacina;
        private $id_posto;
        private $data;
        private $id_pessoa;

        public function __set($atributo, $valor)
        {
           if(property_exists($this,$atributo)){
            $this->$atributo = $valor;
           } 
        }

        public function __get($atributo)
        {
           if(property_exists($this,$atributo)){
            return $this->$atributo;
           } 
        }

        public function cadastrar_registro(){
            $db = new database();
            $con = $db->connect();

            $sql = "INSERT INTO registro_vacina(id_registro_vacina, id_vacina, id_posto, data, id_pessoa) VALUES(:id_registro_vacina, :id_vacina, :id_posto, :data, :id_pessoa)";

            $st = $con->prepare($sql);
            $st->bindParam('id_registro_vacina', $this->id_registro_vacina);
            $st->bindParam('id_vacina', $this->id_vacina);
            $st->bindParam('id_posto', $this->id_posto);
            $st->bindParam('data', $this->data);
            $st->bindParam('id_pessoa', $this->id_pessoa);
            $status = $st->execute();

            $idUsuario = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        public function listarVacina()
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "SELECT registro_vacina.id_registro_vacina, vacina.nome_vacina, vacina.fabricante, posto_vacinacao.razao_social, registro_vacina.data
            FROM registro_vacina
            JOIN vacina ON registro_vacina.id_vacina = vacina.id
            JOIN posto_vacinacao ON registro_vacina.id_posto = posto_vacinacao.id";

            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
            $db->close();
            return $dados;
        }

        public function buscarVacinaPorId($id){

            $db = new database();
            $con = $db->connect(); 
            
            $sql = "SELECT registro_vacina.id_registro_vacina, vacina.nome_vacina, vacina.fabricante, posto_vacinacao.razao_social, registro_vacina.data
            FROM registro_vacina
            JOIN vacina ON registro_vacina.id_vacina = vacina.id
            JOIN posto_vacinacao ON registro_vacina.id_posto = posto_vacinacao.id";
            
            $st = $con->prepare($sql);

            $status = $st->execute();
    
            $dados = $st->fetchAll();
            $db->close();
            return $dados;
        }

        public function atualizar_perfil_vacina(){
            $db = new database();
            $con = $db->connect();

            $sql = "UPDATE registro_vacina set data = :data WHERE id_registro_vacina = :id_registro_vacina";   

            $st = $con->prepare($sql);
            $st->bindParam(':id_registro_vacina', $this->id_registro_vacina);
            $st->bindParam(':data', $this->data);
            $status = $st->execute();
            
            if ($status == true){
                return true;
            }
            else{
                return false;
            }
    
        }

    }

?>