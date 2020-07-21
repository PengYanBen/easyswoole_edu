<?php


namespace App\Lib\File\Validator;


use EasySwoole\EasySwoole\Config;
use EasySwoole\Validate\Validate;

class Video
{
    private $param;

    private $allowFileType;

    private $allowMaxSize;

    private $dir;

    public function __construct($param)
    {
        $this->param = $param;
        $fileConfig = Config::getInstance()->getConf('FILE');
        $this->allowFileType = $fileConfig['ALLOW_FILE_TYPE']['VIDEO'];
        $this->allowMaxSize = $fileConfig['MAX_FILE_SIZE']['VIDEO'];
        $this->dir = $fileConfig['UPLOAD_DIR']['VIDEO'];
    }

    public function check(){
        $v = new Validate();
        $v->addColumn('media_type')->inArray($this->allowFileType);
        $v->addColumn('size')->max($this->allowMaxSize);
        return $v->validate($this->param);
    }

    public function getPath(){
        $path = $this->dir.date('Ymd').'/'.uniqid().'.'.$this->getMediaType();
        return $path;
    }

    private function getMediaType(){
        $param = $this->param;
        $type = explode('/',$param['media_type']);
        $media_type = !empty($type)?$type[1]:"";
        return $media_type;
    }

}