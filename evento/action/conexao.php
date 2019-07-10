<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'calendario';
        private $conexao;

        public function conectar(){
            $this->conexao = null;
            try
            {
                $this->conexao = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', 
                $this->username, $this->password);
            }
            catch(Exception $e)
            {
                die('Erro : '.$e->getMessage());
            }

            return $this->conexao;
        }
    }
?>
