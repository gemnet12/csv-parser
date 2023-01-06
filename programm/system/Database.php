<?php

namespace Programm\System;

use PDO;
use PDOException;

/**
 * Database
 */
class Database
{
    private PDO $dbConnection;

    private static $instance;
    
    /**
     * __construct
     *
     * @return void
     */
    private function __construct()
    {
        $dbHost = getenv('DB_HOST');
        $dbName = getenv('DB_NAME');
        $dbUser = getenv('DB_USER');
        $dbPassword = getenv('DB_PASSWORD');

        $this->dbConnection = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8',
        $dbUser,
        $dbPassword,);
    }
    
    /**
     * getInstance
     *
     * @return Database
     */
    private static function getInstance(): Database
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database;
            return self::$instance;
        }

        return self::$instance;
    }
    
    /**
     * insert
     *
     * @param  string $tableName
     * @param  string $keys
     * @param  string $values
     * @return bool
     */
    public static function insert(string $tableName, string $keys, string $values): bool
    {
        $instance = self::getInstance();
        $queryString = 'INSERT INTO ' . $tableName . ' (' . $keys . ') VALUES ' . $values;
        
        try {
            $query = $instance->dbConnection->prepare($queryString);
            return $query->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function selectAll(string $tableName): array
    {
        $instance = self::getInstance();

        $queryString = 'SELECT * FROM ' . $tableName;

        try {
            $query = $instance->dbConnection->prepare($queryString);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}