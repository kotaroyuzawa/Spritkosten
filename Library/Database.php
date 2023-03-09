<?php
/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */

declare(strict_types=1);

class Database
{
    private PDO $pdo;
    private PDOStatement $stmt;

    public function __construct()
    {
        // Create PDO instance
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=spritkosten', 'root', '');

        } catch (PDOException $e) {
            header("Location:../views/src/500.html");
        }
    }
    // Prepare statement with query
    public function query($sql): void
    {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind(mixed $param, mixed $value, mixed $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet(): array
    {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(): array
    {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }
}
