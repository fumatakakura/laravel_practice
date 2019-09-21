<!-- input.blade.phpをテンプレートとして使う -->
@extends('layout')

<!-- input.blade.phpのtitleの部分 -->
@section('title', '一覧')




<!-- input.blade.phpのコンテンツの部分 -->
@section('content')
    <!-- {{""}}はechoの代わりみたいな -->
    <a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">新規投稿</a>
    @foreach($diaries as $diary)
        <div class="m-4 p-4 border border-primary">
            <p>{{$diary -> title}}</p>
            <p>{{$diary -> body}}</p>
            <p>{{"作成日：".$diary -> created_at}}</p>
            <p>{{"最終更新日：".$diary -> updated_at}}</p>
            <br>
            <a class="btn btn-success" href="{{ route('diary.edit', ['id' => $diary -> id]) }}">編集</a>
            <form action="{{ route('diary.destroy', ['id' => $diary -> id]) }}" method="POST" class="d-inline">
            @csrf
            @method('delete')
                <button class="btn btn-danger">削除</button>
            </form>
        </div>
    @endforeach
@endsection
