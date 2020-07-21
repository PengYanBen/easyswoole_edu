<?php


namespace App\Lib\File;




use App\Lib\Reflector\Reflector;

class Upload
{
    private $file;

    private $checkStatus = false;

    private $path;

    public function __construct($file)
    {
        $this->file = $file;
        $Reflector = new Reflector();
        $obj = $Reflector->newInstance($Reflector->ReflectionClass($this->getMedia()),[
            'size'=> $this->file->getSize(),
            'media_type'=> $this->file->getClientMediaType(),
            'error'=> $this->file->getError(),
            'client_file_name'=> $this->file->getClientFilename(),
            'temp_name'=> $this->file->getTempName(),
            //'steam'=> $this->file->getStream(),
        ]);
        if($obj->check()){
            $this->checkStatus = true;
            $this->path = $obj->getPath();
        }
    }

    public function moveTo($targetPath=''){
        $targetPath = empty($targetPath)?$this->path:$targetPath;
        $this->file->moveTo($targetPath);
        return $targetPath;
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