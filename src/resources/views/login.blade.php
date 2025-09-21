@extends('app')
@section('content')
    <h1>ログイン画面</h1>

    <form class="form" action="{{route("check")}}" method="post">
        @csrf
        ID: <input type="text" name="email">
        PASS: <input type="password" name="password">
        <button class="btn btn-primary">ログイン</button>
    </form>

    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
@endsection