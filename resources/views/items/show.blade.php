@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <dl>
      <dt>
        商品名
      </dt>
        <dd>
          {{ $item->name }}
        </dd>
      <dt>
        画像
      </dt>
        <dd>
          <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
        </dd>
      <dt>
        カテゴリ
      </dt>
        <dd>
          {{ $item->category->name }}
        </dd>
      <dt>
        価格
      </dt>
        <dd>
          {{ $item->price }}
        </dd>
      <dt>
        説明
      </dt>
        <dd>
          {{ $item->description }}
        </dd>
  </dl>
  <div>
      <form action="{{ route('items.confirm', $item) }}">
      @if( $item->orders()->count() >= 1 )
        <p>売り切れ</p>
      @else
        <input type="submit" value="購入する">
      @endif
      </form>
  </div>
@endsection