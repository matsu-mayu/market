@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <div class="content_short">
    <h1>{{ $title }}</h1>
      <div class="Index items_border">
        <div class="items_exhimg">
          <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
        </div>  
        <dl>
            <dt class="items_name">
              商品名
            </dt>
              <dd class="items_name">
                {{ $item->name }}
              </dd>
          <div class="items_flex">
            <div class="items_info"?>
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
            </div>
            <div class="items_info">
              <dt>
                サイズ
              </dt>
                <dd>
                  {{ $item->size->name }}
                </dd>
              <dt>
                カラー
              </dt>
                <dd>
                  {{ $item->color->name }}
                </dd>
              <dt>
                価格
              </dt>
                <dd>
                  {{ number_format($item->price) }}円
                </dd>
              <dt>
                説明
              </dt>
                <dd>
                  {{ $item->description }}
                </dd>
            </div>
          </div>
        </dl>
      </div>
      <div class="Index buy_button">
        <a href="{{ url('/top') }}">トップに戻る</a>
      </div>
  </div>
@endsection