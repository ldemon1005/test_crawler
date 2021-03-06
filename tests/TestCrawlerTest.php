<?php
namespace Tests;
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:35
 */
use PHPUnit\Framework\TestCase;
use Vnp\CrawlerData\CrawlerData;

class TestCrawlerTest extends TestCase
{
    function testGetData(){
        $crawl = new CrawlerData();
        $link = 'http://chiasenhac.vn/';
        $this->expectOutputString('');
        $data_table = $crawl->getTable($link);
        $data_image = $crawl->getImages($link);

        print_r($data_table);
        print_r($data_image);

        $this->assertCount(2,$data_table);
        $this->assertCount(2,$data_image);
    }
}