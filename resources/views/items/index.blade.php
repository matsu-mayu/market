@extends('layouts.logged_in')
 
@section('content')
  <p>息をするように、買おう。</p>
  <a href="{{ route('items.create') }}">新規出品</a>
  <ul>
      @forelse($items as $item)
        <li>
          <div>
            <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
              <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
            </a>
          </div>
          <div>
            商品名：{{ $item->name }} {{ $item->price }}
            <a class="like_button">{{ $item->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
            <form method="POST" class="like" action="{{ route('items.toggle_like', $item) }}">
              @csrf
              @method('patch')
            </form>
          </div>
          <div>
            カテゴリ：{{ $item->category->name }} （{{ $item->created_at }}  {{ $item->description }}
          </div>
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
@endsection