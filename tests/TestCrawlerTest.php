<?php
namespace Tests;
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:35
 */
use PHPUnit\Framework\TestCase;
use \vnp\CrwalerData\CrwalerData;
class TestCrawlerTest extends TestCase
{
    function testGetData(){
        $crawl = new CrwalerData();
        $link = 'http://chiasenhac.vn/';
        $this->expectOutputString('');
        $data_table = $crawl->getTable($link);
        $data_image = $crawl->getImages($link);

        $this->assertCount(2,$data_table);
        $this->assertCount(2,$data_image);
    }
}