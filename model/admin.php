<?php

    require_once ("../infra/database.php");

    class admin{
       
        private $id;
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
        private $nome_vacina;
        private $fabricante;
        private $doenca_alvo;

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

        public function listarTodosAdministradores($pagina = null, $contador = 100)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "SELECT id, nome_completo, cpf, rua, bairro, cidade, numero, num_telefone, email FROM adm_e_usuario WHERE perfil=1 limit $contador";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function deletar_adm_e_usuario($id)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "DELETE FROM adm_e_usuario  WHERE id = :id";
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $db->close();
            return  true;
        }

        public function atualizar_perfis(){
            $db = new database();
            $con = $db->connect();
    
            $sql = "UPDATE adm_e_usuario set nome_completo = :nome_completo, cpf = :cpf, rua = :rua, bairro = :bairro, cidade = :cidade, numero = :numero, num_telefone = :num_telefone,
             email = :email, perfil = :perfil WHERE id = :id";
            
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
            $st->bindValue(':perfil', 1);
            $status = $st->execute();
            
            if ($status == true){
                return true;
            }
            else{
                return false;
            }
    
        }

        public function buscarPerfilPorId($id){

            $db = new database();
            $con = $db->connect(); 
            
            $sql = "SELECT id, nome_completo, cpf, rua, bairro, cidade, numero, num_telefone, email, perfil FROM adm_e_usuario WHERE id = :id";
            
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $dados = $st->fetchAll();
            $db->close();
            return $dados;
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

            $idPosto = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        public function listarTodosPostos($pagina = null, $contador = 100)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "SELECT id, razao_social, cnpj, rua, bairro, cidade, numero, num_telefone, email FROM posto_vacinacao limit $contador";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function deletar_posto_vacinacao($id)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "DELETE FROM posto_vacinacao  WHERE id = :id";
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $db->close();
            return  true;
        }

        public function atualizar_posto(){
            $db = new database();
            $con = $db->connect();
    
            $sql = "UPDATE posto_vacinacao set razao_social = :razao_social, cnpj = :cnpj, rua = :rua, cidade = :cidade, bairro = :bairro, numero = :numero, num_telefone = :num_telefone,
             email = :email WHERE id = :id";
            
            $st = $con->prepare($sql);
            $st->bindParam(':id', $this->id);
            $st->bindParam(':razao_social', $this->razao_social);
            $st->bindParam(':cnpj', $this->cnpj);
            $st->bindParam(':rua', $this->rua);
            $st->bindParam(':cidade', $this->cidade);
            $st->bindParam(':bairro', $this->bairro);
            $st->bindParam(':numero', $this->numero);
            $st->bindParam(':num_telefone', $this->num_telefone);
            $st->bindParam(':email', $this->email);
            $status = $st->execute();
            
            if ($status == true){
                return true;
            }
            else{
                return false;
            }
    
        }

        public function buscarPostoPorId($id){

            $db = new database();
            $con = $db->connect(); 
            
            $sql = "SELECT id, razao_social, cnpj, rua, cidade, bairro, numero, num_telefone, email FROM posto_vacinacao WHERE id = :id";
            
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $dados = $st->fetchAll();
            $db->close();
            return $dados;
        }

        public function cadastrar_vacina(){
            $db = new database();
            $con = $db->connect();

            $sql = "INSERT INTO vacina(nome_vacina, fabricante, doenca_alvo) 
            VALUES(:nome_vacina, :fabricante, :doenca_alvo)";

            $st = $con->prepare($sql);
            $st->bindParam(':nome_vacina', $this->nome_vacina);
            $st->bindParam(':fabricante', $this->fabricante);
            $st->bindParam(':doenca_alvo', $this->doenca_alvo);
            $status = $st->execute();

            $idPosto = $con->lastInsertId();

             if ($status == true){
                 return true;
            }
        }

        public function listarTodasVacinas($pagina = null, $contador = 100)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "SELECT id, nome_vacina, fabricante, doenca_alvo FROM vacina limit $contador";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function deletar_vacina($id)
        {
            $db = new database();
            $con = $db->connect();
    
            $sql = "DELETE FROM vacina WHERE id = :id";
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $db->close();
            return  true;
        }

        public function atualizar_vacina(){
            $db = new database();
            $con = $db->connect();
    
            $sql = "UPDATE vacina set nome_vacina = :nome_vacina, fabricante = :fabricante, doenca_alvo = :doenca_alvo WHERE id = :id";
            
            $st = $con->prepare($sql);
            $st->bindParam(':id', $this->id);
            $st->bindParam(':nome_vacina', $this->nome_vacina);
            $st->bindParam(':fabricante', $this->fabricante);
            $st->bindParam(':doenca_alvo', $this->doenca_alvo);

            $status = $st->execute();
            
            if ($status == true){
                return true;
            }
            else{
                return false;
            }
    
        }

        public function buscarVacinaPorId($id){

            $db = new database();
            $con = $db->connect(); 
            
            $sql = "SELECT id, nome_vacina, fabricante, doenca_alvo FROM vacina WHERE id = :id";
            
            $st = $con->prepare($sql);
            $st->bindParam(':id', $id);
    
            $status = $st->execute();
    
            $dados = $st->fetchAll();
            $db->close();
            return $dados;
        }
        
    }
?>