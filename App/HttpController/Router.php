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

   }


}