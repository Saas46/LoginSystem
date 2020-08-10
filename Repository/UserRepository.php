<?php


class UserRepository extends DB
{
    protected $table = 'users';

    public function all(){
       return $this->selectAll($this->table);
    }

    public function create($data = []){
        return $this->insert($this->table, $data);
    }

    public function find($field, $value, $operator = '='){
        return $this->where($this->table, $field, $value , $operator);
    }

    public function updateRecord($id, $data= []){
        return $this->update($id, $this->table,$data);
    }

}