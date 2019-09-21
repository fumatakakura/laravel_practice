<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
use App\Http\Requests\CreateDiary;
use Carbon\Carbon;


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
    //データ型　変数名
    public function store(CreateDiary $request)
    {
        $diary = new Diary();

        //画面に入力された文字を代入
        $diary->title = $request->title;
        $diary->body = $request->body;

        $diary->save();

        return redirect()->route('diary.index');


    }

    //削除実行メソッド
    public function destroy(int $id)
    {
        //Diaryモデルのインスタンス化
        $diary = new Diary();

        //削除したい要素の取得および削除
        Diary::find($id)->delete();

        //リダイレクト
        return redirect()->route('diary.index');
    }

    //編集画面を表示するメソッド
    public function edit(int $id)
    {
       
         $diary = Diary::find($id);

          //('フォルダ名.ファイル名')
         return view('diaries.edit', [
             'diary' => $diary
         ]);


         

    }

    //編集処理をするメソッド
    public function update(int $id, CreateDiary $request)
    {
        
        //staticなメソッド
        $diary = Diary::find($id);
           

        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->save();

        //リダイレクト
        return redirect()->route('diary.index');
    
        
    }

    
}
