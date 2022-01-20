@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <article class="Index items_border">
        <div class="items_exhimg">
          <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
        </div>  
        <div>
          <p class="items_name">{{ $item->name }}</p>
            <div>
              <dl>
                <div class="items_flex">
                  <div class="items_info">
                    <dt>カテゴリ</dt>
                      <dd>{{ $item->category->name }}</dd>
                    <dt>性別</dt>
                    <dd>{{ $item->gender->name }}</dd>
                    <dt>シェイプ</dt>
                      <dd>{{ $item->shape->name }}</dd>
                    <dt>リムタイプ</dt>
                      <dd>{{ $item->rim->name }}</dd>
                  </div>
                  <div class="items_info">
                    <dt>サイズ</dt>
                      <dd>{{ $item->size->name }}</dd>
                    <dt>カラー</dt>
                      <dd>{{ $item->color->name }}</dd>
                    <dt>価格</dt>
                      <dd>{{ number_format($item->price) }}円</dd>
                    <dt>説明</dt>
                      <dd>{{ $item->description }}</dd>
                  </div>
                </div>
              </dl>
            </div>
        </div>
      </article>
    </main>
    <section class="content_center">
      <div class="Index buy_button">
          <a href="{{ url('/top') }}">トップに戻る</a>
      </div>
    </section>
@endsection