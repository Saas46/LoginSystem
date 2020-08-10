<?php


class Request
{
    public static function uri()
    {
        $parseURL = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return trim($parseURL, '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function data($requestType)
    {
        if ($requestType === 'GET' && isset($_GET)) {
            $data = $_GET;
            $data['method'] = $requestType;
            unset($data['url']);
            return json_decode(json_encode($data), FALSE);
        }
        if ($requestType === 'POST' && isset($_POST)) {
            $data = $_POST;
            $data['method'] = $requestType;
            return json_decode(json_encode($data), FALSE);
        }
    }

}