<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getAddress {$zipcode?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '郵便番号を入力すると住所を取得できます。';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "郵便番号を入力してください。" . "\n";
        /**
         * 郵便番号を入力してintegerに変換
         */
        $zipcode = intval(fgets(STDIN));

        /**
         * preg_match: trueなら1, falseなら0を返す。
         */
        $pattern = '/\d{7}/';
        $bool = preg_match($pattern, $zipcode);

        /**
         * 正規表現がtrueで文字列が7の時だけ住所を返す。
         */
        if ($bool === 1 && mb_strlen($zipcode) === 7) {
            echo "郵便番号は" . $zipcode . "\n";
        } else {
            echo "ハイフン無しの半角整数7文字で入力してください。";
            return;
        }

//        $params = [
//            'zipcode' => $zipcode,
//        ];

        /**
         * compact(): 変数名とその値から配列を作成する。
         * 戻り値は　[zipcode] => *******;
         */
        $params = compact('zipcode');
        print_r($params);

        $base_url = "https://zip-cloud.appspot.com/api/search?";
        /**
         * $base_urlにエンコードされたクエリを追加する。
         */

        $url = $base_url . http_build_query($params);

        echo $url . "\n";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        /**
         * curl_exec: curlセッションを実行
         */
        curl_exec($ch);

    }
}
