<?php


namespace App\HttpController\Media;
use App\Lib\File\Upload;
use EasySwoole\Http\Message\UploadFile;


class Video extends Base
{

    public function get()
    {
        $this->writeJson('200',123213,'sucess');
    }

    public function create()
    {
        new Upload($this->request()->getUploadedFile('file'));
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}