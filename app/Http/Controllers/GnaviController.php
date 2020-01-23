<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;


class GnaviController extends Controller
{
    public function index()
    {
//        $base_url = "https://api.gnavi.co.jp/RestSearchAPI/v3/";
        $base_url = "https://qiita.com/busyoumono99/items/9b5ffd35dd521bafce47";

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $base_url, [
//            'query' => ['keyid' => $_ENV['API_KEY'],
//                'name' => "魚",
//            ]
        ]);

        try {
            //assoc: true の場合返り値は連想配列になる。
//            $json = json_decode($res->getBody(), true);
//            return view('gnavi.index', $json);
            var_dump($res) . "\n";
//            var_dump($json) . "\n";
        } catch (\Exception $e) {
           return view('welcome');
//            $e->getMessage();
        }
    }
}
