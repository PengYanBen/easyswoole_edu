<?php


namespace App\Lib\File;




use App\Lib\Reflector\Reflector;

class Upload
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
        $Reflector = new Reflector();
        $obj = $Reflector->newInstanceArgs($Reflector->ReflectionClass($this->getMedia()),[
            'size'=> $this->file->getSize(),
            'steam'=> $this->file->getStream(),
            'media_type'=> $this->file->getClientMediaType(),
            'error'=> $this->file->getError(),
            'cilent_file_name'=> $this->file->getClientFilename(),
            'temp_name'=> $this->file->getTempName(),
        ]);
        var_dump($obj);exit();
    }

    public function moveTo($targetPath){
        $this->file->moveTo($targetPath);
    }

    public function getMedia($type=0){
        $media = explode('/',$this->file->getClientMediaType());
        if(!empty($media)){
            return $media[$type];
        }else{
            return false;
        }
    }

    public function getSize(){
        return  $this->file->getSize();
    }

    public function getClientMediaType(){
        return  $this->file->getClientMediaType();
    }

    public function getError(){
        return  $this->file->getError();
    }

    public function getClientFilename(){
        return  $this->file->getClientFilename();
    }

    public function getTempName(){
        return  $this->file->getTempName();
    }
}