<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\AbstractRouter;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use FastRoute\RouteCollector;


class Router extends AbstractRouter
{

    function initialize(RouteCollector $routeCollector){

        $routeCollector->addGroup('/api',function (RouteCollector $collector){
            $collector->get('/user', '/User/User/get');
            $collector->post('/user', '/User/User/create');
            $collector->patch('/user', '/User/User/update');
            $collector->delete('/user', '/User/User/delete');
        });


        $routeCollector->addGroup('/api/media',function (RouteCollector $collector){
            $collector->get('/video', '/Media/Video/get');
            $collector->post('/video', '/Media/Video/create');
            $collector->patch('/video', '/Media/Video/update');
            $collector->delete('/video', '/Media/Video/delete');
        });

   }


}