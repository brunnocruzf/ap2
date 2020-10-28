<?php

//define informações de acesso ao banco em constantes
define('DB_HOST'        , "localhost");
define('DB_USER'        , "user");
define('DB_PASSWORD'    , "user");
define('DB_NAME'        , "dbphp7");
define('DB_DRIVER'      , "sqlsrv");

class Conexao
{
    //declara a variavel para conexão
    private static $connection;
    //construtor para executar quando classe for instânciada
    private function __construct(){}

    public static function getConnection() {
        //string de conexão, busca dados da conexão armazenado nas contantes e seta $pdoConfig
        $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }
}

?>