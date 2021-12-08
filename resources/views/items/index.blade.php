@extends('layouts.logged_in')
 
@section('content')
  <a href="{{ route('items.create') }}">新規出品</a>
  
  <form method="GET" action="{{route('items.index')}}">
        <input type="search" name="search" placeholder="キーワードを入力" value="@if (isset($search)) {{ $search }} @endif">
        <div>
          <label>
            カテゴリー：
              <select name="category_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>    
          </label>
        </div>
        <div>
          <label>
            性別：
              <select name="gender_id">
                @foreach($genders as $gender)
                  <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
              </select>    
          </label>
        </div>
        <div>
          <label>
            シェイプ：
              <select name="shape_id">
                @foreach($shapes as $shape)
                  <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                @endforeach
              </select>    
          </label>
      </div>
      <div>
          <label>
            リムタイプ：
              <select name="rim_id">
                @foreach($rims as $rim)
                  <option value="{{ $rim->id }}">{{ $rim->name }}</option>
                @endforeach
              </select>    
          </label>
      </div>
      <div>
          <label>
            サイズ：
              <select name="size_id">
                @foreach($sizes as $size)
                  <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
              </select>    
          </label>
        </div>
        <div>
          <label>
            カラー：
              <select name="color_id">
                @foreach($colors as $color)
                  <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
              </select>    
          </label>
        </div>
        <div>
            <button type="submit">検索</button>
        <button>
            <a href="{{ route('items.index') }}">
                クリア
            </a>
        </button>
        </div>
  </form>
    
  <ul class="Index">
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
            性別：{{ $item->gender->name }} （{{ $item->created_at }}  {{ $item->description }}
          </div>
          <div>
            シェイプ：{{ $item->shape->name }} （{{ $item->created_at }}  {{ $item->description }}
          </div>
          <div>
            リムタイプ：{{ $item->rim->name }} （{{ $item->created_at }}  {{ $item->description }}
          </div>
          <div>
            サイズ：{{ $item->size->name }} （{{ $item->created_at }}  {{ $item->description }}
          </div>
          <div>
            カラー：{{ $item->color->name }} （{{ $item->created_at }}  {{ $item->description }}
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