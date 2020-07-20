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
        $Upload = new Upload($this->request()->getUploadedFile('file'));
        $Upload->moveTo('../');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}