<?php


namespace App\Lib\File\Validator;


class Image
{
    private $dir;

    private $size;

    private $ext;


    public function __construct($file)
    {
        $this->file = $file;
    }


    public function check(){
        if(true){
            return [
                'target_path'=>'1111111',
                'file_name'=>'22222',
                'size'=>'333333333',
            ];
        }

    }

}