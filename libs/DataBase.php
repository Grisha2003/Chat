<?php

namespace Dependency;

class DataBase
{
    private $connect;
    private $result;

    public function __construct(string $host, string $dbName, string $login, string $password) 
    {
        $this->connect = pg_connect("host={$host} dbname={$dbName} user={$login} password={$password}");
    }

    public function checkConnect() 
    {
        $result = true;
        if ($this->connect == false) {
            $result = false;
        }

        return $result;
    }

    public function set(string $tableName, array $data): bool
    {
        $ret = true;
        $query = "INSERT INTO {$tableName} (name, password, color, token) VALUES ($1, $2, $3, $4)";
        $result = pg_query_params($this->connect, $query, $data); 
        if ($result == false) {
            $ret = false;
        }

        return $ret;
        
    }
    

    public function get(string $tableName, array $id)
    {
        $query = "SELECT * FROM {$tableName} WHERE id = $1";
        $result = pg_fetch_all(pg_query_params($this->connect, $query, $id));
        return $result;
    }

    public function delete(string $dbName, array $id) 
    {
        $query = "DELETE FROM {$dbName} WHERE id = $1";
        $result = pg_query_params($this->connect, $query, $id);
    }
}