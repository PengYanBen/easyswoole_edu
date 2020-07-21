<?php
return [
    'SERVER_NAME' => "EasySwoole",
    'MAIN_SERVER' => [
        'LISTEN_ADDRESS' => '0.0.0.0',
        'PORT' => 9501,
        'SERVER_TYPE' => EASYSWOOLE_WEB_SERVER, //可选为 EASYSWOOLE_SERVER  EASYSWOOLE_WEB_SERVER EASYSWOOLE_WEB_SOCKET_SERVER,EASYSWOOLE_REDIS_SERVER
        'SOCK_TYPE' => SWOOLE_TCP,
        'RUN_MODEL' => SWOOLE_PROCESS,
        'SETTING' => [
            'worker_num' => 8,
            'reload_async' => true,
            'max_wait_time'=>3,
            'package_max_length' =>50*1024*1024,
            'buffer_output_size'=>50*1024*1024,
        ],
        'TASK'=>[
            'workerNum'=>4,
            'maxRunningNum'=>128,
            'timeout'=>15
        ],
    ],
    'TEMP_DIR' => null,
    'LOG_DIR' => null,
    'FILE'=>[
        'UPLOAD_DIR'=>[
            'ROOT'=>EASYSWOOLE_ROOT.'/upload/',
            'IMG'=>EASYSWOOLE_ROOT.'/upload/IMG/',
            'VIDEO'=>EASYSWOOLE_ROOT.'/upload/VIDEO/',
        ],
        'ALLOW_FILE_TYPE'=>[
            'IMG'=>['image/png','image/jpeg'],
            'VIDEO'=>['video/mp4'],
        ],
        'MAX_FILE_SIZE'=>[
            'IMG'=>1*1024*1024,
            'VIDEO'=>100*1024*1024,
        ],
    ],
    'FFMPEG'=>[
        'SETTING'=>[
            'ffmpeg.binaries'  => '/home/server/ffmpeg/bin/ffmpeg',
            'ffprobe.binaries' => '/home/server/ffmpeg/bin/ffprobe',
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ],
        'ENABLE'=>false
    ],
    'MYSQL' => \Yaconf::get('mysql')['main'],
    'REDIS' => \Yaconf::get('redis')['main'],
];
