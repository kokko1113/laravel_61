@extends('app')
@section('content')
    <h1>イベント情報一覧</h1>

    <a href="{{route("dash")}}">戻る</a>
    <a href="{{route("event.create")}}" class="btn btn-primary">イベント情報新規登録</a>

    <table class="table">
        <tr>
            <th>イベント名</th>
            <th>開催場所</th>
            <th>開催日時</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->place}}</td>
                <td>{{$item->date}}</td>
                <td><a href="{{route("event.edit",$item->id)}}" class="btn btn-success">編集</a></td>
                <td>
                    <form action="{{route("event.destroy",$item->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection