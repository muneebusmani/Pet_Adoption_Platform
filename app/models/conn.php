<?php
namespace models;
use PDO;
class conn extends PDO {
    
    private $dsnPrefix;
    private $serverName;
    private $databaseName;
    private $username;
    private $password;
    private $options; 

    function __construct(
        string $dsnPrefix,
        string $serverName,
        string $databaseName,
        string $username,
        string $password,
        array $options
    ) {
        $this->serverName = $serverName;
        $this->databaseName = $databaseName;
        $this->dsnPrefix = $dsnPrefix;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

    public function create() {
        try {
            $dsn = "$this->dsnPrefix:Server=$this->serverName;Database=$this->databaseName";
            $conn = new PDO($dsn, $this->username, $this->password, $this->options);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            // Extract the error message from the exception
            $errorMessage = $e->getMessage();
            $errorMessage = strstr($errorMessage, 'Login failed for user');

            // Display the error message on the page
            echo "<p>Error: $errorMessage</p>";

            // Return null to indicate connection failure
            return null;
        }
    }
}
