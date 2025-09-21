@extends('app')
@section('content')
    <h1>人材情報一覧</h1>

    <a href="{{route("dash")}}">戻る</a>
    <a href="{{route("worker.create")}}" class="btn btn-primary">人材情報新規登録</a>

    <table class="table">
        <tr>
            <th>氏名</th>
            <th>メールアドレス</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><a href="" class="btn btn-success">編集</a></td>
                <td>
                    <form action="{{route("worker.destroy",$item->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" onclick="return confirm('削除してよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection