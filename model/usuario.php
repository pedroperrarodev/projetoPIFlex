<?php
    require_once ("../infra/database.php");

    class usuario{
       
        private $nome_completo;
        private $cpf;
        private $cep;
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

        public function __construct()
        {
            
        }

        
    }

?>