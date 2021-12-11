@extends('layouts.logged_in')

@section('content')
  <div class="content">
  <h1>{{ $title }}</h1>
  
  <div class="search_box">
    <div class="create_box">
        <a href="{{ route('items.create') }}" class="button_create">出品する</a>
    </div>
    
    <div class="search">
      <form method="GET" action="{{route('items.index')}}">
        <p>検索フォーム</p>
          <div class="search_flex">
            <div>
              <label>
                カテゴリー：
                  <select name="category_id">
                    <option value="">選択してください</option>
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
                    <option value="">選択してください</option>
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
                    <option value="">選択してください</option>
                    @foreach($shapes as $shape)
                      <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                    @endforeach
                  </select> 
                  <div id="modal_shape">
                    <p>シェイプとは？</p>
                      <p>メガネの形を表します。</p>
                  </div>
                  <a class="modal-visible-link" href="#modal_shape"><img src="/images/question.png"></a>
              </label>
            </div>
            <div class="spacer"></div>
            <div>
              <label>
                リムタイプ：
                  <select name="rim_id">
                    <option value="">選択してください</option>
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
                    <option value="">選択してください</option>
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
                    <option value="">選択してください</option>
                    @foreach($colors as $color)
                      <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                  </select>    
              </label>
            </div>
          </div>
          <div class="search_button">
            <button type="submit" class="button">検索</button>
            <a href="{{ route('items.index') }}" class="button">
                クリア
            </a>
          </div>
      </form>
    </div>
  </div>
  
    <ul class="list_none">
      <li>
        @forelse($items as $item)
        <div class="item_border">
          <div class="item_flex">
            <div class="item_img">
              <div>
                <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                  <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
                </a>
              </div>
              <div class="button">
                お気に入りに追加：
                  <a class="like_button">{{ $item->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                  <form method="POST" class="like" action="{{ route('items.toggle_like', $item) }}">
                    @csrf
                    @method('patch')
                  </form>
              </div>
            </div>
            
            <div class="item_description">
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
            <div class="sold_sell">
              {{ $item->isSold() ? '売り切れ' : '販売中' }}
            </div>
            </div>
          </div>
        </div>
          </li>
      @empty
          <li class="no_items">商品はありません。</li>
      @endforelse
    </ul>
      <script>
        /* global $ */
        $('.like_button').on('click', (event) => {
            $(event.currentTarget).next().submit();
        })
        
        $(".modal-visible-link").modaal();
      </script>
    </div>
@endsection