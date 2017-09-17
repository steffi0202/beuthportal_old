<?php

class DatabaseTest extends PHPUnit_Extensions_Database_TestCase
{
     
    static private $pdo = null;
    private $conn = null;
     
    public function getConnection()
    {
 
        if ($this->conn === null)
        {
            if (self::$pdo == null)
            {
                self::$pdo = Database::connect();
            }
 
            $this->conn = $this->createDefaultDBConnection(self::$pdo, "person");
        }
         
        return $this->conn;
         
    }
}