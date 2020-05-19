<?php


namespace App\HttpController\User;



use EasySwoole\EasySwoole\Trigger;

class User extends Base
{

    public function get()
    {
        $data = [];
        $redis_conf = \Yaconf::get('redis');
        $redis = new \redis();
        $redis -> connect('127.0.0.1',6377);
        $redis -> auth($redis_conf['redis']['passwd']);
        
        var_dump($redis -> config('get','requirepass'));


        $this->writeJson('200',$data,'sucess');
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