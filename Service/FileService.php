<?php


class FileService
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function uploadFile($file = [])
    {
        try {
            if ($this->fileUploadingError($file['error'])) {
                if ($this->allowedFileType($file['type'])) {
                    return $this->uploadFileInNewPath($file['tmp_name'], $file['type']);
                }
            }
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function uploadFileInNewPath($tempFilePath, $fileType)
    {
        $fileNewName = uniqid('', true) . "." . $this->allowedFileType($fileType);
        $fileDestination = 'Storage/File/' . $fileNewName;

        if (move_uploaded_file($tempFilePath, $fileDestination)) {
            return "Successfully upload file";
        } else {
            throw new Exception('Cannot upload file, please try again');
        }
    }

    public function allowedFileType($fileType)
    {
        $allowedFileType = ['jpg', 'jpeg', 'png'];
        $type = explode('/', $fileType)[1];

        if (in_array($type, $allowedFileType)) {
            return $type;
        } else {
            throw new Exception('File Type is not Accepted, Please Select jpeg, jpg, png');
        }
    }

    public function fileUploadingError($fileError)
    {
        if (!$fileError) {
            return true;
        } else {
            throw new Exception('Error, while uploading file');
        }
    }
}