@extends('layouts.logged_in')
 
@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
  <a href="{{ route('items.create') }}" class="button_create">出品する</a>
  <ul class="list_none">
      <li>
        @forelse($items as $item)
      <div class="item_border">
            <dl>
                <div class="item_flex">
                    <div class="item_img">
                        <dt>
                            <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                            <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
                            </a>
                        </dt>
                    </div>
                    <div class="item_description">
                        <dt>商品名</dt>
                            <dd>{{ $item->name }}</dd>
                        <dt>商品説明</dt>
                            <dd>{{ $item->description }}</dd>
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
                        <div class="sold_sell">
                            {{ $item->isSold() ? '売り切れ' : '販売中' }}
                        </div>
                    </div>
                </div>
            </dl>
            
                
                [<a href="{{ route('items.edit', $item) }}">編集</a>]
                [<a href="{{ route('items.edit_image', $item) }}">画像を変更</a>]
                
                <form method="post" action="{{ route('items.destroy', $item) }}">
                    @csrf
                    @method('delete')
                    <input class="button" type="submit" value="削除">
                </form>
        </div>
            </li>  
    @empty
        <li>商品はありません。</li>
    @endforelse
    </div>
  </ul>
  </div>
@endsection