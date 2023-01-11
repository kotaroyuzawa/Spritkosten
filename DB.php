<?php
require 'vendor/autoload.php';
require 'log_init.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DB
{
    public $pdo;
    public function __construct($db, $username = NULL, $password = NULL, $host){

    $dsn = "mysql:host=$host;dbname=$db";

        try {
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {

            $pdoConnectionError->pushHandler(new StreamHandler('log_file.log'));
            $pdoConnectionError->critical("DB connection error: " . $e->getMessage());

        }
    }

    /**
     * @return false|PDOStatement
     */
    public function run(string $sql, array $args = NULL)
    {
        if (!$args) {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}