<?php
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:06
 */

namespace Vnp\CrawlerData;

use http\Exception;
use Vnp\CrawlerData\Exception\Exception404;

class CrawlerData
{
    private function getDom($link)
    {
        $ch = curl_init($link);

        $headers = [
            'Content-Type: text/html; charset=utf-8',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        $dom = new simple_html_dom($content);

        return $dom;
    }

    /*
     *  lấy dữ liệu trong table (dữ liệu thẻ th và td)
     */

    public function getTable($link){
        $html = $this->checkUrl($link);
        $tables = $html->find('table');
        $data_tab = [];

        if(count($tables)){
            foreach ($tables as $key => $table){
                $list_th = $table->find('th');
                foreach ($list_th as $key_th => $th){
                    $data_tab[$key]['th'][$key_th] = html_entity_decode($th->text());
                }
                $list_td = $table->find('td');
                foreach ($list_td as $key_td => $td){
                    $data_tab[$key]['td'][$key_td] = html_entity_decode($td->text());
                }
            }
        }

        $result = [
            'count' => count($tables),
            'data_table' => $data_tab
        ];

        return $result;
    }

    /*
     *  lấy ảnh và mô tả
     */

    public function getImages($link){
        $html = $this->checkUrl($link);
        $images = $html->find('img');
        $list_img = [];

        if(count($images)){
            foreach ($images as $image){
                $list_img[] = [
                    'src' => $image->src,
                    'alt' => $image->alt
                ];
            }
        }

        $result = [
            'count' => count($images),
            'list_img' => $list_img
        ];

        return $result;
    }

    /*
     *  kiểm tra có get được dữ liệu từ link không
     */

    private function checkUrl($link){
        $html = $this->getDom($link);
        if($html->size == null){
            throw new Exception404();
        }
        return $html;
    }
}