<?php


class Controller
{
    /**
     * Send it to different html view
     * @param $name
     * @param array $data
     * @return mixed
     */
    protected function view($name , $data = [])
    {
        extract($data);
        return require 'views/' . $name . '.view.php';
    }
}
