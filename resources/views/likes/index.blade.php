@extends('layouts.logged_in')
 
@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
  <ul class="list_none">
    <li>
      @forelse($like_items as $like_item)
        <div class="item_border">
          <dl>
            <div class="item_flex">
              <div class="item_img">
                <dt>
                  <a href="{{ route('items.show', $like_item) }}" enctype="multipart/form-data">
                    <img enctype="multipart/form-data" src="{{ asset('storage/' .$like_item->image) }}">
                  </a>
                </dt>
              </div>
            <div class="item_description">
              <dt>商品名</dt>
                <dd>{{ $like_item->name }}</dd> {{ $like_item->price }}
              <dt>カテゴリ</dt>
                <dd>{{ $like_item->category->name }}</dd>
              <dt>性別</dt>
                <dd>{{ $like_item->gender->name }}</dd>
              <dt>シェイプ</dt>
                <dd>{{ $like_item->shape->name }}</dd>
              <dt>リムタイプ</dt>
                <dd>{{ $like_item->rim->name }}</dd>
              <dt>サイズ</dt>
                <dd>{{ $like_item->size->name }}</dd>
              <dt>カラー</dt>
                <dd>{{ $like_item->color->name }}</dd>
            </div>
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