@extends('layouts.logged_in')
 
@section('content')
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
        性別
      </dt>
        <dd>
          {{ $item->gender->name }}
        </dd>
      <dt>
        シェイプ
      </dt>
        <dd>
          {{ $item->shape->name }}
        </dd>
      <dt>
        リムタイプ
      </dt>
        <dd>
          {{ $item->rim->name }}
        </dd>
      <dt>
        サイズ
      </dt>
        <dd>
          {{ $item->size->name }}
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
    <form action="{{ route('items.finish', $item) }}">
      @if( $item->orders()->count() >= 1 )
        <p>売り切れ</p>
      @else
        <input type="submit" value="内容を確認し、購入する">
      @endif
    </form>
@endsection