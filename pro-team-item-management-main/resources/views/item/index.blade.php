@extends('adminlte::page')

@section('title', '商品一覧')


@section('content_header')
    <h1>商品一覧</h1>
    <form action="{{ route('item_search') }}" method="GET">
        <input type="text" name="keyword" value="" placeholder="商品名を入力">
        <input type="submit" value="検索">
    </form>
@stop


@section('content')
@can('isAdmin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <!-- 編集ボタン -->
                                        <form action="{{ route('item_showedit', ['id'=>$item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-btn"></i>編集
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <!-- 削除ボタン -->
                                        <form action="{{ route('item_destroy', ['id'=>$item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか？")'>
                                                <i class="fa fa-btn fa-trash"></i>削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $items->links('pagination::bootstrap-4') }}
@else
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>{{ $item->stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $items->links('pagination::bootstrap-4') }}
@endcan
@stop


@section('css')
@stop

@section('js')
@stop
