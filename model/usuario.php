<?php
    require_once ("../infra/database.php");

    class usuario{
       
        private $nome_completo;
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

        public function cadastrar(){
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
            $st->bindParam(':perfil', 2);
            $status = $st->execute();

            $idUsuario = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        
    }

?>