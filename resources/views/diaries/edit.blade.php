<!-- input.blade.phpをテンプレートとして使う -->
@extends('layout')

<!-- input.blade.phpのtitleの部分 -->
@section('title', '一覧')




<!-- input.blade.phpのコンテンツの部分 -->
@section('content')
    <!-- {{""}}はechoの代わりみたいな -->
    <a href="{{ route('diary.index') }}" class="btn btn-primary btn-block">キャンセル</a>
    <section class="container m-5">
    <div class="row justify-content-center">
        <div class="col-8">

        @if($errors->any())

                <ul class="list-unstyled">
                    @foreach($errors->all() as $message)
                        <li class="alert alert-danger">
                             {{$message}}
                        </li>

                    @endforeach
                </ul>


            @endif

             
            <form action="{{ route('diary.update', ['id' => $diary -> id]) }}" method="POST">
            @csrf
             @method('put')
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title', $diary->title)}}" />
                </div>
                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea class="form-control" name="body" id="body">{{old('body', $diary->body)}}</textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
                
            </form>
        </div>
    </div>
</section>
@endsection