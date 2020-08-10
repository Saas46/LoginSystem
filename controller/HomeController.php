<?php


class HomeController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new FileService();
    }

    public function upload(){
        if($_FILES['file']){
            $fileMessage = $this->service->uploadFile($_FILES['file']);
            return $this->view('index', ['fileMessage' => $fileMessage]);
        }
    }
}