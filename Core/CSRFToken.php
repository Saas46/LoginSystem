<?php

class CSRFToken {

    protected $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    public function generate(){
        return $this->session->put('token', md5(uniqid()));
    }

    public function check($token , $tokenName){
        if ($token === $this->session->get($tokenName)){
            $this->session->delete($tokenName);
            return true;
        }
        return false;
    }
}