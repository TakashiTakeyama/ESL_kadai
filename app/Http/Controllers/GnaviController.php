<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \GuzzleHttp\Client;


class GnaviController extends Controller
{
    public function index()
    {
        $base_url = "https://api.gnavi.co.jp/RestSearchAPI/v3/";
//        $base_url = "https://qiita.com/busyoumono99/items/9b5ffd35dd521bafce47";

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $base_url, [
            'query' => ['keyid' => $_ENV['API_KEY'],
                'name' => "魚 うなぎ",
            ]
        ]);

        /**
         * json形式でresponseを受け取るには？
         */
//        $array = $res->json();
//        print_r($array);

        try {
            //assoc: true の場合返り値は連想配列になる。
            //getBody(): コンテンツを取得する。html要素を取得した。
            $json = file_get_contents($res);
            $json = json_decode($res, true);
//            \Log::info($json);
            var_dump($json);
            print_r($json);
//            var_dump($res);
//            return $res->json();
//            $json = (string) $res->getBody();
        } catch (\Exception $e) {
            return view('welcome');
//            $e->getMessage();
        } finally {
            return "取得しました。";
        }
    }
}
