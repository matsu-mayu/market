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
        シャイプ
      </dt>
        <dd>
          {{ $item->shape->name }}
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
    <a href="{{ url('/top') }}">トップに戻る</a>
  </div>
@endsection