<?php
namespace App\Lib\Redis;
use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Trigger;

class Redis
{
    private $conf;
    private $redis;

    use Singleton;

    public function __construct($config)
    {
        $this->conf = $config;
        try {
            $this->redis = new \redis();
            $this->connect();
        }catch (\Exception $exception){
            Trigger::getInstance()->error('redis connect error',-1);
        }
    }

    public function connect(){
        $this->redis-> connect($this->conf['host'],$this->conf['port']);
        $this->redis-> auth($this->conf['passwd']);
    }

    public function get($key){
        return $this->redis->get($key);
    }
}