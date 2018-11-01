<?php
namespace Tests;
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:35
 */
use PHPUnit\Framework\TestCase;
include_once __DIR__.'/../src/CrwalerData.php';
class TestCrawlerTest extends TestCase
{
    function testGetData(){
        $crawl = new \vnp\CrwalerData\CrwalerData();
        $link = '';
        $data = $crawl->get_data($link);
        $this->assertSame(">=0",$data);
    }

    function testReturnTrue(){
        $a = true;
        $this->assertSame(true,$a);
    }
}