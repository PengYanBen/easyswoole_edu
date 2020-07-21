<?php


namespace App\Lib\Reflector;




use function Couchbase\defaultDecoder;

class Reflector
{

    public function ReflectionClass($type){
        $map = [
            'video'=>'App\Lib\File\Validator\Video',
            'image'=>'App\Lib\File\Validator\Image'
        ];
        return $map[$type];
    }

    public function newInstance($className,$param=[],$instance=true){
        return $instance?(new \ReflectionClass($className))->newInstance($param):$className;
    }
}