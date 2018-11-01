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
include_once __DIR__.'/../src/Library/simple_html_dom.php';
class TestCrawlerTest extends TestCase
{
    function testGetData(){
        $crawl = new \vnp\CrwalerData\CrwalerData();
        $link = 'https://www.24h.com.vn/bong-da-c48.html';
        $this->expectOutputString('');
        $data = $crawl->get_data($link);
        $this->assertCount(2,$data);
    }
}