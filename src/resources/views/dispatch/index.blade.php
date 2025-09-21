@extends('app')
@section('content')
    <h1>派遣情報一覧</h1>

    <a href="{{route("dash")}}">戻る</a>
    <a href="{{route("dispatch.create")}}" class="btn btn-primary">派遣情報新規登録</a>

    <table class="table">
        <tr>
            <th>イベント名</th>
            <th>人材の氏名</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->event->name}}</td>
                <td>{{$item->worker->name}}</td>
                <td><a href="" class="btn btn-success">編集</a></td>
                <td>
                    <form action="{{route("dispatch.destroy",$item->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection