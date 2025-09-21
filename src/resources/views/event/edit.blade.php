@extends('app')
@section('content')
    編集画面

    <a href="{{route("event.index")}}">戻る</a>

    <form action="{{route("event.update",$item->id)}}" method="post">
        @csrf
        @method("patch")
        イベント名 <input type="text" name="name" value="{{$item->name}}">
        開催場所 <input type="text" name="place" value="{{$item->place}}">
        開催日時 <input type="date" name="date" value="{{$item->date}}">
        <button class="btn btn-success">更新</button>
    </form>

    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    @if (session("message"))
        <p class="text-primary">{{session("message")}}</p>
    @endif
@endsection