<?php
namespace Tests\Lib;
use App\Lib\Reflector\Reflector;
use PHPUnit\Framework\TestCase;

class ReflectorTest extends TestCase
{
    public function testReflector()
    {
        $Reflector = new Reflector();
        $Reflector->ReflectionClass("App\Lib\File\Upload",["id"=>123]);
    }


}