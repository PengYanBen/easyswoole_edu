<?php


namespace App\HttpController\User;
use App\Lib\Redis\Redis;
use EasySwoole\EasySwoole\Config;


class User extends Base
{

    public function get()
    {
        $Redis = Redis::getInstance(Config::getInstance()->getConf("REDIS"));
        var_dump($Redis->get('test'));
        $this->writeJson('200',$Redis->get('test'),'sucess');
    }

    public function create($id)
    {
        $this->response()->write('创建用户');
    }

    public function update()
    {
        $this->response()->write('更新用户');
    }

    public function delete()
    {
        $this->response()->write('删除用户');
    }
}