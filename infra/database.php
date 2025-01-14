<?php
    class database{
        private $server;
        private $user;
        private $password;
        private $port;
        private $nome_db;
        private $db_type;
        private $connection;

        function __construct()
        {   
            $this->load_config();
        }

        private function load_config(){
            include_once "config.ini.php";
            $this->server = $config["server"];
            $this->user = $config["user"];
            $this->password = $config["password"];
            $this->port = $config["port"];
            $this->nome_db = $config["nome_db"];
            $this->db_type = $config["db_type"];
            
        }

        public function connect(){
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];
             
            if(empty($this->port)){
                $this->connection = new PDO($this->db_type.":host=".$this->server.";dbname=".$this->nome_db, $this->user, $this->password, $options);
            }
            else{
                $this->connection = new PDO($this->db_type.":host=".$this->server.";dbname=".$this->nome_db.";port=".$this->port, $this->user, $this->password, $options);
            }
            return $this->connection;
        }

        public function close(){
            $this->connection = null;
        }
    }
?>