<?php

declare(strict_types=1);

$array = [
    'name' => 'takashi',
    'gender' => '男',
    'age' => 35,
    'email' => 'take@gmail.com',
    'address' => [
        'pref' => 'tokyo',
        'city' => 'suginami',
        'house_number' => 5 - 16 - 6,
    ],
];

print_r($array);

echo json_encode($array) . "\n";

class ObjectToArray
{
//    public function __construct()
//    {
//
//    }
}
$arr = [
    'name' => 'kanbe',
    'age' => 28,
];

$obj = new ObjectToArray($arr);

echo gettype($obj);
echo json_encode($obj) . "\n";
echo 'ObjectにArray----------------' . "\n";

//$url = "https://qiita.com/fantm21/items/603cbabf2e78cb08133ehttps://qiita.com/fantm21/items/603cbabf2e78cb08133e";
$url = 'https://api.zipaddress.net/?zipcode=4530809';
echo gettype($url) . "\n"; //戻り値はstring

try {
    $json = file_get_contents($url);
//    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    echo gettype($json) . "\n"; //戻り値はstring
    echo 'jsonの型';
    $obj = json_decode($json);
    echo gettype($obj) . "\n"; //戻り値はobject
    var_dump($obj);
    /**
     * jsonの戻り値はobject(stdClass)になると思う。
     * json_decode: でobject(stdClass)に変換している。
     */
    print_r($obj);
//    \Log::info($arr);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo gettype($json);
