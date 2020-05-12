<?php


namespace App\HttpController\Cart;


use EasySwoole\Http\AbstractInterface\Controller;

class Cart extends Controller
{

    public function index()
    {
        $this->response()->write('cart module ');
    }

}