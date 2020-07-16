<?php


namespace App\Lib\Reflector;




class Reflector
{

    public function ReflectionClass($type){
        $map = [
            'video'=>'App\Lib\File\Validator\Video',
            'image'=>'App\Lib\File\Validator\Image'
        ];
        return $map[$type];
    }

    public function newInstanceArgs($className,$param=[],$instance=false){
        return $instance?$className:(new \ReflectionClass($className))->newInstanceArgs($param);
    }
}