<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 01.02.18
 * Time: 12:00
 */

namespace Tests\Controllers;

use Core\RequestMethod;
use PHPUnit\Framework\TestCase;

class RequestMethodControllerTest extends TestCase
{
    public function testValidCalculation()
    {
        $a = 5;
        $b =6;
        $storage = new RequestMethod();
        $result = $storage ->calc($a, $b);
        $this->assertEquals(11, $result);
    }

    public function testIncorrectParamsCalculation()
    {
        $a = '5';
        $b =6;
        $storage = new RequestMethod();
        $result = $storage ->calc($a, $b);
        $this->assertNotEquals(11, $result);
    }
}
