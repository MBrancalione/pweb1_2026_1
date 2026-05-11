<?php

class db {

    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $port     = '3306';
    private $dbname   = 'db_pweb1_2026_1';
    private $table_name;
    private $conn; // conexão fica guardada para reutilizar

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect(); // cria a conexão uma única vez
    }

    // Método privado: apenas a própria classe pode chamar
    private function connect()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }

    //INSERT INTO `tabela` (`campo1`, `campo2`) VALUES ('?', '?', '?');
    public function store($dados){

    

        $campos = ""; //oncatenas os camps do formulário
        $marcadores = ""; //concatenas as interrogações, valores
        $vetorData = [];
        $sep = "";

        foreach($dados as $campo => $valor){
            $campos .= $sep . $campo; //campo1, campo2
            $marcadores .= $sep . "?"; //?, ?, ?
            $vetorData[] = $valor; //guarda os valores em um vetor para passar no execute
            $sep = ", "; //após a primeira iteração, passa a ser ", " para separar os campos e marcadores
        }
        //concatenação dos dados que vem do banco para inserir no insert
        $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores)";
        try{
            $st = $this->conn->prepare($sql); //prepara a query
            $st->execute($vetorData); //executa a query passando os valores do vetor
        }catch(PDOException $e){
            var_dump('Erro na inserção: ' . $e->getMessage());
        }

        
        
        


    }
}