@extends('app')
@section('content')
    <h1>メニュー画面</h1>

    <a href="{{route("logout")}}" class="btn btn-primary">ログアウト</a>

    <a href="{{route("event.index")}}">イベント情報一覧</a>
    <a href="{{route("worker.index")}}">人材情報一覧</a>
    <a href="{{route("dispatch.index")}}">派遣情報一覧</a>
@endsection