<?php

declare(strict_types=1);

$api_key = '321bae548b148f84';
$base_url = "http://webservice.recruit.co.jp/carsensor/usedcar/v1/?key={$api_key}";

$params = [
    'model' => 'クラウン',
    //    'color' => '白',
    //    'keyword' => '新古車',
];

$url = $base_url . '&' . http_build_query($params);
echo $url . "\n";
$res = curl_init($url);
$xml = curl_exec($res);

var_dump($xml);

//$xmlObj = simplexml_load_string($xml);
//$xml = simplexml_load_string(getBody($xml));
//$xml = new simpleXMLElement($xml);

//
//var_dump($xmlObj);
//データ型が不明: void
