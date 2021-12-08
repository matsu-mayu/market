@extends('layouts.logged_in')
 
@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
  <ul class="Index">
    @forelse($like_items as $like_item)
      <dl class="Index">
        <dt>
          <a href="{{ route('items.show', $like_item) }}" enctype="multipart/form-data">
            <img enctype="multipart/form-data" src="{{ asset('storage/' .$like_item->image) }}">
          </a>
        </dt>
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
      </dl>
      <div>
        {{ $like_item->isSold() ? '売り切れ' : '販売中' }}
      </div>
    @empty
      <li>お気に入りはありません。</li>
    @endforelse
  </ul>
  </div>
@endsection