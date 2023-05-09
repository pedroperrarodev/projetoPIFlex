<?php

    require_once ("../infra/database.php");

    class admin{
       
        private $nome_completo;
        private $razao_social;
        private $cnpj;
        private $cpf;
        private $rua;
        private $bairro;
        private $cidade;
        private $numero;
        private $num_telefone;
        private $email;
        private $senha;

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

        public function cadastrar_admin(){
            $db = new database();
            $con = $db->connect();

            $sql = "INSERT INTO adm_e_usuario(nome_completo, cpf, rua, bairro, cidade, numero, num_telefone, email, senha, perfil) 
            VALUES(:nome_completo, :cpf, :rua, :bairro, :cidade, :numero, :num_telefone, :email, :senha,:perfil)";

            $st = $con->prepare($sql);
            $st->bindParam(':nome_completo', $this->nome_completo);
            $st->bindParam(':cpf', $this->cpf);
            $st->bindParam(':rua', $this->rua);
            $st->bindParam(':bairro', $this->bairro);
            $st->bindParam(':cidade', $this->cidade);
            $st->bindParam(':numero', $this->numero);
            $st->bindParam(':num_telefone', $this->num_telefone);
            $st->bindParam(':email', $this->email);
            $st->bindParam(':senha', $this->senha);
            $st->bindValue(':perfil', 1);
            $status = $st->execute();

            $idUsuario = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        public function cadastrar_posto(){
            $db = new database();
            $con = $db->connect();

            $sql = "INSERT INTO posto_vacinacao(razao_social, cnpj, rua, bairro, cidade, numero, num_telefone, email) 
            VALUES(:razao_social, :cnpj, :rua, :bairro, :cidade, :numero, :num_telefone, :email)";

            $st = $con->prepare($sql);
            $st->bindParam(':razao_social', $this->razao_social);
            $st->bindParam(':cnpj', $this->cnpj);
            $st->bindParam(':rua', $this->rua);
            $st->bindParam(':bairro', $this->bairro);
            $st->bindParam(':cidade', $this->cidade);
            $st->bindParam(':numero', $this->numero);
            $st->bindParam(':num_telefone', $this->num_telefone);
            $st->bindParam(':email', $this->email);
            $status = $st->execute();

            $idUsuario = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }


        
    }
?>