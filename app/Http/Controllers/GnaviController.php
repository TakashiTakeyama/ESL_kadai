<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;

class GnaviController extends Controller
{
    public function index()
    {
        $base_url = "https://api.gnavi.co.jp/RestSearchAPI/v3/";

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $base_url, [
            'query' => ['keyid' => $_ENV['API_KEY'],
                'name' => "魚 うなぎ",
            ]
        ]);

        /**
         * json形式でresponseを受け取るには？
         * $array = $res->json();
         * print_r($array);
         */

        try {
            //assoc: true の場合返り値は連想配列になる。
            //getBody(): コンテンツを取得する。
            // (string) キャストしている。
            $json = (string) $res->getBody();
            Log::info($json);
            return $json;
        } catch (\Exception $e) {
            Log::info($e);
            return view('welcome');
            //finallyの処理が優先されてしまう。
//         } finally {
//             return "取得しました。";
        }
    }
}
