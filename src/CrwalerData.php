<?php
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:06
 */

namespace vnp\CrwalerData;

include_once __DIR__.'/Library/simple_html_dom.php';
class CrwalerData
{
    function getDom($link)
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

    public function get_data($link){
        $html = $this->getDom($link);

        $html = $html->load($html->__toString());

        $result = [];

        $tables = $html->find('table');

        $data_tab = [];

        if(count($tables)){
            foreach ($tables as $key => $table){
                $list_td = $table->find('td');
                foreach ($list_td as $td){
                    $data_tab[$key][$td->innertext] = [];
                }
                var_dump($data_tab);die;
            }
        }

        $result['tables'] = [
            'count' => count($tables)
        ];

        $images = $html->find('img');
        $link_img = [];
        if(count($images)){
            foreach ($images as $image){
                $link_img[] = $image->src;
            }
        }

        $result ['images'] = [
            'count' => count($images),
            'link' => $link_img
        ];
        var_dump(json_encode($result));die;


        return $result;
    }
}