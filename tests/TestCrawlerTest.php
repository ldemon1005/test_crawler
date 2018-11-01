<?php
namespace Tests;
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:35
 */
use PHPUnit\Framework\TestCase;
class TestCrawlerTest extends TestCase
{
    function testGetData(){
        $crawl = new \vnp\CrwalerData\CrwalerData();
        $link = 'http://chiasenhac.vn/';
        $this->expectOutputString('');
        $data = $crawl->get_data($link);
        $this->assertCount(2,$data);
    }
}