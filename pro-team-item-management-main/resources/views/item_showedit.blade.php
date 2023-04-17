@extends('adminlte::page')

@section('title', '登録商品編集')

@section('content_header')
    <h1>登録商品の編集</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="container-sm">
        <h4 class="text-center">商品名:【{{$item->name}}】</h4>
        <form action="/item_edit" method="post" class="">
            @csrf
            <div class="card-body">
            <input class="form-control" type="text" name="id" value="{{$item->id}}" hidden>
            <div class="form-group row">
                <div class="col-4"></div>
                <div class="col-1"><label for="name">商品名</label></div>
                <div class="col-4"><input class="form-control" type="text" name="name" value="{{$item->name}}"></div>
                <div class="col-3"></div>
            </div>
            <div class="form-group row">
                <div class="col-4"></div>
                <div class="col-1"><label for="number">種別</label></div>
                <div class="col-4">
                    <select class="form-control" type="text" name="type">
                        <option>種別を選択してください</option>
                        <option value="筆記具" @if ($item->type == "筆記具") selected @endif>筆記具</option>
                        <option value="修正用具" @if ($item->type == "修正用具") selected @endif>修正用具</option>
                        <option value="綴じ具" @if ($item->type == "綴じ具") selected @endif>綴じ具</option>
                        <option value="接着用具" @if ($item->type == "接着用具") selected @endif>接着用具</option>
                    </select>
                </div>
                <div class="col-3"></div>    
            </div>
            <div class="form-group row">
                <div class="col-4"></div>
                <div class="col-1"><label for="detail">詳細</label></div>
                <div class="col-4"><input class="form-control" type="text" name="detail" value="{{$item->detail}}"></div>
                <div class="col-3"></div>    
            </div>
            <div class="form-group row">
                <div class="col-4"></div>
                <div class="col-1"><label for="stock">在庫数</label></div>
                <div class="col-4"><input class="form-control" type="number" name="stock" value="{{$item->stock}}"></div>
                <div class="col-3"></div>    
            </div>
            </div>
            <div class="card-footer">
            <div class="form-group row">
                <div class="col-5"></div>
                <div class="col-4"><button type="submit" class="btn btn-secondary">編集</button></div>
                <div class="col-3"></div>
            </div>
            </div>
        </form>
    </div>
</div>
@stop