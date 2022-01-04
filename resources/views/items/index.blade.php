@extends('layouts.logged_in')

@section('content')
  <div class="content">
  
  <div class="search_box">
    <div class="create_box">
        <a href="{{ route('items.create') }}" class="button_create">出品する</a>
    </div>
    
    <div class="search">
      <form method="GET" action="{{route('items.index')}}">
        <p>検索フォーム</p>
          <div class="search_flex">
            <div>
              <label class="items_label">
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
              <label class="items_label">
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
              <label class="items_label">
                シェイプ
                <div id="modal_shape">
                    <p class="modal_title">≪シェイプとは？≫</p>
                      <p>メガネの形を表します。</p>
                  </div>
                  <a class="modal-visible-link" href="#modal_shape"><img class="modal_icon" src="/images/question.png"></a>
                  ：
                  <select name="shape_id">
                    <option value="">選択してください</option>
                    @foreach($shapes as $shape)
                      <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                    @endforeach
                  </select> 
                  
              </label>
            </div>
            <div>
              <label class="items_label">
                リムタイプ
                <div id="modal_rim">
                    <p class="modal_title">≪リムタイプとは？≫</p>
                      <p>縁（フチ）のタイプを表します。</p>
                  </div>
                  <a class="modal-visible-link" href="#modal_rim"><img class="modal_icon" src="/images/question.png"></a>
                  ：
                  <select name="rim_id">
                    <option value="">選択してください</option>
                      @foreach($rims as $rim)
                        <option value="{{ $rim->id }}">{{ $rim->name }}</option>
                      @endforeach
                  </select>    
              </label>
            </div>
            <div>
              <label class="items_label">
                サイズ
                <div id="modal_size">
                  <p class="modal_title">≪サイズの見方≫</p>
                    <p>テンプル（柄の部分）に記載されたサイズをご確認ください。</p>
                    <div class="content_center">
                      <div>
                        <img class="size_img" src="/images/size.png" alt="size">
                      </div>
                      <div>
                        <img class="size_img" src="/images/size1.png" alt="size">
                      </div>
                    </div> 
                    <div class="size_exp">
                      52-レンズ横幅</br>18-ブリッジ幅</br>140-テンプルの長さ 
                    </div>
                </div>
                  <a class="modal-visible-link" href="#modal_size"><img class="modal_icon" src="/images/question.png"></a>：
                  <select name="size_id">
                    <option value="">選択してください</option>
                    @foreach($sizes as $size)
                      <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                  </select>    
              </label>
            </div>
            <div>
              <label class="items_label">
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
  
    <ul class="index_flex">
      @forelse($items as $item)
        <li class="items_border items_margin">
            <div>
              <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                <img class="items_img" enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
              </a>
            </div>
            <div class="button">
              お気に入りに追加：
                <a class="like_button">{{ $item->isLikedBy(Auth::user()) ? '★　' : '☆　' }}</a>
                <form method="POST" class="like" action="{{ route('items.toggle_like', $item) }}">
                  @csrf
                  @method('patch')
                </form>
            </div>
            <div>   
              <dl class="items_flex">
                  <div class="items_info">
                    <dt>商品名</dt>
                      <dd>{{ $item->name }}</dd>
                    <dt>カテゴリー</dt>
                      <dd>{{ $item->category->name }}</dd>
                    <dt>性別</dt>
                      <dd>{{ $item->gender->name }}</dd>
                    <dt>シェイプ</dt>
                      <dd>{{ $item->shape->name }}</dd>
                  </div>
                  <div class="items_info">
                    <dt>リムタイプ</dt>
                      <dd>{{ $item->rim->name }}</dd>
                    <dt>サイズ</dt>
                      <dd>{{ $item->size->name }}</dd>
                    <dt>カラー</dt>
                      <dd>{{ $item->color->name }}</dd>
                    <dt>価格</dt>
                      <dd>{{ number_format($item->price) }}円</dd>
                  </div>
              </dl>
            </div>
            <div class="sold_sell">
              {{ $item->isSold() ? '売り切れ' : '販売中' }}
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
@endsection