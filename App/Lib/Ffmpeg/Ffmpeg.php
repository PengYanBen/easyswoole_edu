<?php


namespace App\Lib\Ffmpeg;

use EasySwoole\EasySwoole\Config;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
class Ffmpeg
{

    private $ffmpeg;

    private $source;

    private $video;

    public function __construct($source)
    {
        $config = Config::getInstance()->getConf('FFMPEG'); //自定义设置
        if($config['ENABLE']){
            $config = $config['SETTING'];
        }else{
            $config =[];
        }
        $ffmpeg = \FFMpeg\FFMpeg::create($config);
        $this->ffmpeg = $ffmpeg;
        $this->source = $source;
        $this->video = $this->getVideo();
    }

    public function getVideo(){
        $video = $this->ffmpeg->open($this->source);
        return $video;
    }

    /**获取
     *
     */
    public function Transcoding(){
        $format = new X264();
        $format->on('progress', function ($video, $format, $percentage) {
            echo "$percentage % transcoded";
        });
        $format
            ->setKiloBitrate(1000)
            ->setAudioChannels(2)
            ->setAudioKiloBitrate(256);
        $video = $this->getVideo();

        $video->save($format,$this->source);
    }

    /**保存预览图
     * @param $savePath 保存路径
     * @param int $seconds 几秒开始
     * @return mixed
     */
    public function saveFromSeconds($savePath,$seconds=1){
        $video = $this->video;
        $frame = $video->frame(TimeCode::fromSeconds($seconds));
        $frame->save($savePath);
        return $savePath;
    }

    /**转换成gif动图
     * @param string $savePath 保存路径
     * @param int $seconds 几秒开始
     * @param array $diemsion 尺寸
     * @param int $duration 持续时间
     */
    public function gif($savePath,$seconds=1,$diemsion=['width'=>640,'height'=>480],$duration=3){
        $video = $this->video;
        $video->gif(TimeCode::fromSeconds($seconds),new Dimension($diemsion['width'], $diemsion['height']),$duration)->save($savePath);
        return $savePath;
    }

}