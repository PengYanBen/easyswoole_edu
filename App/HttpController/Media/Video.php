<?php


namespace App\HttpController\Media;
use App\Lib\Ffmpeg\Ffmpeg;
use App\Lib\File\Upload;
use EasySwoole\EasySwoole\Config as GlobalConfig;


class Video extends Base
{

    public function get()
    {
        $this->writeJson('200',123213,'sucess');
    }

    public function create()
    {
        $Upload = new Upload($this->request()->getUploadedFile('file'));
        $file_path = $Upload->moveTo();
        $thumb_save_path = $file_path.".gif";
        $Ffmpeg = new Ffmpeg($file_path);
        //$Ffmpeg->saveFromSeconds($thumb_save_path,5);
        $Ffmpeg->gif($thumb_save_path);
        $this->writeJson('200',['file_path'=>$file_path,'thumb_save_path'=>$thumb_save_path],'sucess');

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}