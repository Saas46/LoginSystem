<?php

require 'config.php';

class DB
{
    private $pdo;

    public function __construct()
    {
        try {
            $config = new Config();
            $this->pdo = new PDO(
                $config->driver.':host='.$config->host.';dbname='. $config->dbname,
                $config->username,
                $config->password
            );
        } catch (PDOException $e) {
            die($e->getMessage() . 'Something went wrong while connecting with Database');
        }
    }

    protected function selectAll($table, $mapClass = null)
    {
        $statement = $this->pdo->prepare('select * from '. $table);
        $statement->execute();
        if (null != $mapClass) {
            return $statement->fetchAll(PDO::FETCH_CLASS, $mapClass);
        }
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    protected function where($table, $field, $value, $operator = '='){
        $data = ':'. $field;
        $query = "SELECT * FROM {$table} WHERE {$field} {$operator} {$data}";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue($data, $value);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }


    protected function insert($table, $parameters = [])
    {
        $field = implode(', ',array_keys($parameters));
        $value = implode(', ', $this->insertPlaceholderValue(array_keys($parameters)));
        $query = 'INSERT INTO %s (%s) values (%s)';

        $sql = sprintf($query, $table, $field, $value);
        return $this->pdo->prepare($sql)->execute($parameters);
    }

    protected function update($id , $table, $parameters = []){
        $field = array_keys($parameters);
        $map = $this->updatePlaceholderValue($field);
        $query = 'UPDATE %s SET %s WHERE id=:id';

        $sql = sprintf($query,$table,$map);
        return $this->pdo->prepare($sql)->execute($parameters);
    }

    protected function delete($table, $id) {
        $query = 'DELETE FROM % WHERE id = :id';

        $sql = sprintf($query,$table);
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->rowCount();
    }


    private function insertPlaceholderValue($parameters = [])
    {
        return array_map(function ($parameter) {
            return ':' . $parameter;
        }, $parameters);
    }

    private function updatePlaceholderValue($parameters = [])
    {
        return implode(', ',array_map(function ($parameters) {
            return $parameters.'=:' . $parameters;
        }, $parameters));
    }
}