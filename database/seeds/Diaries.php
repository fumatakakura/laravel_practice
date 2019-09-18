<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Diaries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diaries = [
            [
                'title' => '初めてのセブ',
                'body' => 'PC日本に忘れた'
            ],
            [
                'title' => '週末のオスロブ',
                'body' => 'ジンベイでか'
            ],
            [
                'title' => '卒業',
                'body' => 'パスポート寮に忘れたw'
            ]
        ];

        foreach($diaries as $diary){
            //DBにデータを登録
            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
