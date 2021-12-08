@extends('layouts.logged_in')
 
@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
  <a class="item_create" href="{{ route('items.create') }}">出品する</a>
  <ul class="Index">
        @forelse($items as $item)
            <dl>
                <dt>
                    <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                    <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
                    </a>
                </dt>
                <dt>商品名</dt>
                    <dd>{{ $item->name }}</dd>
                <dt>カテゴリー</dt>
                    <dd>{{ $item->category->name }}</dd>
                <dt>性別</dt>
                    <dd>{{ $item->gender->name }}</dd>
                <dt>シェイプ</dt>
                    <dd>{{ $item->shape->name }}</dd>
                <dt>リムタイプ</dt>
                    <dd>{{ $item->rim->name }}</dd>
                <dt>サイズ</dt>
                    <dd>{{ $item->size->name }}</dd>
                <dt>カラー</dt>
                    <dd>{{ $item->color->name }}</dd>
                <dt>価格</dt>
                    <dd>{{ $item->price }}円</dd>
            </dl>
    
                [<a href="{{ route('items.edit', $item) }}">編集</a>]
                [<a href="{{ route('items.edit_image', $item) }}">画像を変更</a>]
                
                <form method="post" class="delete" action="{{ route('items.destroy', $item) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除">
                </form>
                <div>
                    {{ $item->description }}
                </div>
                <div>
                    {{ $item->isSold() ? '売り切れ' : '販売中' }}
                </div>
            </li>  
    @empty
        <li>商品はありません。</li>
    @endforelse
  </ul>
  </div>
@endsection