@extends('app')
@section('content')
    新規登録入力画面

    <a href="{{route("event.index")}}">戻る</a>

    <form action="{{route("event.store")}}" method="post">
        @csrf
        イベント名 <input type="text" name="name">
        開催場所 <input type="text" name="place">
        開催日時 <input type="date" name="date">
        <button class="btn btn-success">登録</button>
    </form>

    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p class="text-danger">{{session("message")}}</p>
    @endif
@endsection