<?php


namespace App\HttpController\Media;


use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\EasySwoole\Trigger AS trigger;
use EasySwoole\Http\Message\Status;

class Base extends Controller
{

    public function index()
    {

    }

    function onRequest(?string $action): ?bool
    {
        return true;
    }

    /**
     * 捕获异常
     * @param \Throwable $throwable
     */
    function onException(\Throwable $throwable): void
    {
        //拦截错误进日志,使控制器继续运行
        Trigger::getInstance()->throwable($throwable);
        $this->writeJson(Status::CODE_INTERNAL_SERVER_ERROR, null, $throwable->getMessage());
    }
}