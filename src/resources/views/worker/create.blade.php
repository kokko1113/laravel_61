@extends('app')
@section('content')
    新規登録入力画面

    <a href="{{route("worker.index")}}">戻る</a>

    <form action="{{route("worker.store")}}" method="post">
        @csrf
        氏名 <input type="text" name="name">
        メールアドレス <input type="text" name="place">
        パスワード <input type="password" name="password">
        メモ <input type="text" name="memo">
        <button class="btn btn-success">登録</button>
    </form>

    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p class="text-danger">{{session("message")}}</p>
    @endif
@endsection