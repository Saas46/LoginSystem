<?php

class Session {

    public function __construct()
    {
        session_start();
    }

    public function exists($name){
        return isset($_SESSION[$name]);
    }

    public function put($name, $value){
        return $_SESSION[$name] = $value;
    }

    public function get($name){
        return $_SESSION[$name];
    }

    public function delete($name){
        if($this->exists($name)){
            unset($_SESSION[$name]);
        }
    }

//    public function flash($name, $string = ''){
//        $this->put($name, $string);
//        $session = $this->get($name);
//        $this->delete($name);
//        return $session;
//    }
}