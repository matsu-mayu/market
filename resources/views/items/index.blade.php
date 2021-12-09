@extends('layouts.logged_in')

@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
    <a href="{{ route('items.create') }}" class="button">出品する</a>
    <ul class="Index">
        @forelse($items as $item)
          <li>
            <div>
              <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
              </a>
            </div>
            <div>
              お気に入りに追加：
              <a class="like_button">{{ $item->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
              <form method="POST" class="like" action="{{ route('items.toggle_like', $item) }}">
                @csrf
                @method('patch')
              </form>
            </div>
            <dl>
                <dt>商品名</dt>
                    <dd>{{ $item->name }}</dd>
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
            </dl>
            <div>
              {{ $item->isSold() ? '売り切れ' : '販売中' }}
            </div>
          </li>
      @empty
          <li>商品はありません。</li>
      @endforelse
    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      /* global $ */
      $('.like_button').on('click', (event) => {
          $(event.currentTarget).next().submit();
      })
    </script>
    </div>
@endsection