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

        $result['tables'] = [
            'count' => count($tables)
        ];

        $images = $html->find('img.src');

        $result ['images'] = [
            'count' => count($images),
            'link' => $images
        ];

        return $result;
    }
}