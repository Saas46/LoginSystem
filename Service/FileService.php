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
        $tempFilePath = $file['tmp_name'];
        if ($this->allowedFileType($file['type'])) {
            if($this->fileUploadingError($file['error'])){
                $fileNewName = uniqid('' , true). ".".$this->allowedFileType($file['type']);
                $fileDestination = 'Storage/File/' .$fileNewName;

                if(move_uploaded_file($tempFilePath,$fileDestination)){
                    return "Successfully upload file";
                } else {
                    return "Cannot upload file, please try again";
                }
            }
            return "Error, while uploading file";
        }
        return "File Type is not Accepted, Please Select jpeg, jpg, png";
    }

    public function allowedFileType($fileType)
    {
        $allowedFileType = ['jpg', 'jpeg', 'png'];
        $type = explode('/', $fileType)[1];

        if (in_array($type, $allowedFileType)) {
            return $type;
        }
        return false;
    }

    public function fileUploadingError($fileError)
    {
        if (!$fileError) {
            return true;
        }
        return false;
    }
}