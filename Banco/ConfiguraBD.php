<?php


    
    class configuraBD  {
    private $hostname = "localhost"; // Endereço do servidor MySQL
    private $username = "root";      // Nome de usuário do MySQL
    private $password = "";          // Senha do MySQL
    private $database = "lojacarros";
    private $connecao ;
 
        public function __construct() {
             $this->connecao = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        }
    
        public function NovaConecxao():mysqli {
            return $this->connecao;
        }
    
    
    
    }