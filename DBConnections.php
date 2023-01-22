<?php
class ConnOracle
{
    public $dbh;
    function __construct()
    {
        try {

            $host         = "server-ip";
            $db_username    = "user-db";
            $db_password    = "pass-db";
            $service_name   = "teste";
            $sid            = "teste";
            $port           = 1521;
            $dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

            //$this->dbh = new PDO("mysql:host=".$server.";dbname=".dbname, $db_username, $db_password);

            $this->dbh = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $db_username, $db_password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Retorna o erro se houver.
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            )); //Controla como a próxima linha será retornada, FETCH_ASSOC retorna um array indexado pelo nome da coluna.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

class ConnPostgres
{
    public $conn;
    function PostgresConn(){
        try {
            $host           = "server-ip";
            $db_name        = "postgres";
            $db_username    = "user-db";
            $db_password    = "pass-db";
    
            $this->conn = new PDO("pgsql:host=".$host.", dbname=".$db_name.", ".$db_username.", ".$db_password);
                } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }    
}
class ConnMySql
{
    public $conn;
    function MysqlLI()
    {
        $host = "localhost";
        $database = "databasename";
        $username = "username";
        $password = "password";

        $this->conn = mysqli_connect($host, $username, $password, $database);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
        mysqli_close($this->conn);
    }
    
    function MysqlPDO()
    {
        $host = 'localhost';
        $dbname = 'nomedobancodedados';
        $username = 'nomedousuario';
        $password = 'senha';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            echo "Conectado a $dbname em $host com sucesso.";
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
        }
    }
}
