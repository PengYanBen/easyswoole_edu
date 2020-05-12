<?php


namespace App\HttpController\User;



use EasySwoole\EasySwoole\Trigger;

class User extends Base
{

    public function get()
    {
        $this->response()->write('获取用户模块');
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