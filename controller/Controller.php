<?php


class Controller
{
    /**
     * Send it to different html view
     * @param $name
     * @param array $data
     * @return mixed
     */
    public function view($name , $data = [])
    {
        extract($data);
        return require 'views/' . $name . '.view.php';
    }
}