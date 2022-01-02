@extends('layouts.logged_in')
 
@section('content')
<div class="content">
  <h1>{{ $title }}</h1>
    <ul class="index_flex">
      <li>
        @forelse($like_items as $like_item)
          <div class="items_border items_margin">
            <div class="items_exhimg">
              <a href="{{ route('items.show', $like_item) }}" enctype="multipart/form-data">
                <img enctype="multipart/form-data" src="{{ asset('storage/' .$like_item->image) }}">
              </a>
            </div>
              <dl class="items_flex">
                <div class="items_info">
                  <dt>商品名</dt>
                    <dd>{{ $like_item->name }}</dd>
                  <dt>カテゴリ</dt>
                    <dd>{{ $like_item->category->name }}</dd>
                  <dt>性別</dt>
                    <dd>{{ $like_item->gender->name }}</dd>
                  <dt>シェイプ</dt>
                    <dd>{{ $like_item->shape->name }}</dd>
                </div>
                <div class="items_info">
                  <dt>リムタイプ</dt>
                    <dd>{{ $like_item->rim->name }}</dd>
                  <dt>サイズ</dt>
                    <dd>{{ $like_item->size->name }}</dd>
                  <dt>カラー</dt>
                    <dd>{{ $like_item->color->name }}</dd>
                  <dt>価格</dt>
                    <dd>{{ number_format($like_item->price) }}</dd>
                </div>
              </dl>
          
              <div class="sold_sell">
                {{ $like_item->isSold() ? '売り切れ' : '販売中' }}
              </div>
            </div>
      </li>
        @empty
          <li>お気に入りはありません。</li>
        @endforelse
    </ul>
</div>
@endsection