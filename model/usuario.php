<?php
    require_once ("../infra/database.php");

    class usuario{
       
        private $id;
        private $nome_completo;
        private $cpf;
        private $rua;
        private $bairro;
        private $cidade;
        private $numero;
        private $num_telefone;
        private $email;
        private $senha;
        private $perfil;

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

        public function cadastrar_usuario(){
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
            $st->bindValue(':perfil', 2);
            $status = $st->execute();

            $idUsuario = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        public function atualizar_perfil_usuario(){
            $db = new database();
            $con = $db->connect();

            $sql = "UPDATE adm_e_usuario set nome_completo = :nome_completo, cpf = :cpf, rua = :rua, bairro = :bairro, cidade = :cidade, numero = :numero, 
            num_telefone = :num_telefone, email = :email, perfil = :perfil WHERE id = :id";   

            $st = $con->prepare($sql);
            $st->bindParam(':id', $this->id);
            $st->bindParam(':nome_completo', $this->nome_completo);
            $st->bindParam(':cpf', $this->cpf);
            $st->bindParam(':rua', $this->rua);
            $st->bindParam(':bairro', $this->bairro);
            $st->bindParam(':cidade', $this->cidade);
            $st->bindParam(':numero', $this->numero);
            $st->bindParam(':num_telefone', $this->num_telefone);
            $st->bindParam(':email', $this->email);
            $st->bindValue(':perfil', 2);
            $status = $st->execute();
            
            if ($status == true){
                return true;
            }
            else{
                return false;
            }
    
        }

        public function buscarUsuarioPorId($session){

            $db = new database();
            $con = $db->connect(); 
            
            $sql = "SELECT id, nome_completo, cpf, rua, bairro, cidade, numero, num_telefone, email, perfil FROM adm_e_usuario WHERE perfil = 2 AND id = $session";       
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function listarUsuario($session,$pagina = null, $contador = 100)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "SELECT DISTINCT id, nome_completo, cpf, rua, bairro, cidade, numero, num_telefone, email FROM adm_e_usuario WHERE perfil = 2 AND id = $session limit $contador";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function autenticar($cpf, $senha){

            $senha_cripto = hash("sha3-256",$senha);
            $database = new database();
            $con = $database->connect();

            $sql = "SELECT id, perfil, cpf, nome_completo From adm_e_usuario WHERE cpf = :cpf AND senha = :senha";

            $st = $con->prepare($sql);
            $st->bindParam(':cpf', $cpf);
            $st->bindParam(':senha', $senha_cripto);
            $retorno = $st->execute();
            $dados = $st->fetchAll();
    
            if (sizeof($dados) == 1){
                return $dados;
            }
            else{
                return null;
            }
            
        }
        
    }

?>