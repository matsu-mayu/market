@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
  <ul>
    @forelse($like_items as $like_item)
      <li>
        <div>
          <a href="{{ route('items.show', $like_item) }}" enctype="multipart/form-data">
            <img enctype="multipart/form-data" src="{{ asset('storage/' .$like_item->image) }}">
          </a>
        </div>
        <div>
          商品名：{{ $like_item->name }} {{ $like_item->price }}
        </div>
        <div>
          カテゴリ：{{ $like_item->category->name }} {{ $like_item->created_at }}
          {{ $like_item->description }}
        </div>
        <div>
          シャイプ：{{ $like_item->shape->name }} {{ $like_item->created_at }}
          {{ $like_item->description }}
        </div>
        <div>
          {{ $like_item->isSold() ? '売り切れ' : '販売中' }}
        </div>
    @empty
      <li>お気に入りはありません。</li>
    @endforelse
  </ul>
@endsection