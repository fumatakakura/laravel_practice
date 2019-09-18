<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Diary;

class DiaryController extends Controller
{
    public function index()
    {
        //diariesテーブルのデータを全件取得
        //allメソッド：全件データを取得するメソッド
        $diaries = Diary::all();

        // dd($diaries); var_dumpみたいな
        //view(フォルダ名,ファイル名)
        return view('diaries.index', [
            'diaries' => $diaries
        ]);
    }

    public function create()
    {
        return view('diaries.create');
    }

    //新規投稿の画面で投稿ボタンが押された時投稿処理をするメソッド
    public function store(Request $request)
    {
        dd($request->title,$request->body);

    }
}
