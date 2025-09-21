@extends('app')
@section('content')
    新規登録入力画面

    <a href="{{ route('dispatch.index') }}">戻る</a>

    <form action="{{ route('dispatch.store') }}" method="post">
        @csrf
        イベント名
        <select name="event_id">
            @foreach ($events as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        人材の氏名
        <select name="worker_id[]" multiple>
            @foreach ($workers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        メモ <input type="text" name="memo">
        <button class="btn btn-success">登録</button>
    </form>

    @if ($errors->any())
        <p class="text-danger">{{ $errors->first() }}</p>
    @endif
    @if (session('message'))
        <p class="text-primary">{{ session('message') }}</p>
    @endif
@endsection
