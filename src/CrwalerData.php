<?php
/**
 * Created by PhpStorm.
 * User: localhost
 * Date: 01/11/2018
 * Time: 16:06
 */

namespace vnp\CrwalerData;

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

        $result = [];

        if($html->size == null){
            return $result;
        }
        $html = $html->load($html->__toString());

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

        $result['tables'] = [
            'count' => count($tables),
            'data_table' => $data_tab
        ];

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

        $result ['images'] = [
            'count' => count($images),
            'list_img' => $list_img
        ];
        $file = __DIR__."/../logs/log.json";

        if(file_exists($file)){
            file_put_contents($file,json_encode($result));
        }

        return $result;
    }
}