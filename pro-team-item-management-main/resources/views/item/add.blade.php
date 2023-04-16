@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" >商品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select type="text" class="form-control" id="type" name="type">
                                <option>種別を選択してください</option>
                                <option>筆記具</option>
                                <option>修正用具</option>
                                <option>綴じ具</option>
                                <option>接着用具</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
