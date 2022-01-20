@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
    <main>
      <ul class="index_flex">
        <li>
          @forelse($like_items as $like_item)
            <div class="items_border items_margin">

              <div class="items_exhimg">
                <a href="{{ route('items.show', $like_item) }}" enctype="multipart/form-data">
                  <img enctype="multipart/form-data" src="{{ asset('storage/' .$like_item->image) }}">
                </a>
              </div>

              <div>
                <p class="items_name">{{ $like_item->name }}</p>
                  <div>
                    <dl>
                      <div class="items_flex">
                        <div class="items_info">
                          <dt>カテゴリ</dt>
                            <dd>{{ $like_item->category->name }}</dd>
                          <dt>性別</dt>
                            <dd>{{ $like_item->gender->name }}</dd>
                          <dt>シェイプ</dt>
                            <dd>{{ $like_item->shape->name }}</dd>
                          <dt>リムタイプ</dt>
                            <dd>{{ $like_item->rim->name }}</dd>
                        </div>
                        <div class="items_info">
                          <dt>サイズ</dt>
                            <dd>{{ $like_item->size->name }}</dd>
                          <dt>カラー</dt>
                            <dd>{{ $like_item->color->name }}</dd>
                          <dt>価格</dt>
                            <dd>{{ number_format($like_item->price) }}円</dd>
                          <dt>説明</dt>
                            <dd>{{ $like_item->description }}</dd>
                        </div>
                      </div>
                    </dl>
                  </div>
              </div>

              <div>
                お気に入りから削除
                  <a class="like_button {{ $like_item->isLikedBy(Auth::user()) ? 'liked' : 'not_liked' }}">
                    {{ $like_item->isLikedBy(Auth::user()) ? '★' : '☆' }}
                  </a>
                  <form method="POST" action="{{ route('items.toggle_like', $like_item) }}">
                    @csrf
                    @method('patch')
                  </form>
              </div>

              <div class="sold_sell {{ $like_item->isSold() ? 'sold' : '' }}">
                {{ $like_item->isSold() ? '売り切れ' : '販売中' }}
              </div>

            </div>
        </li>
          @empty
            <li>お気に入りはありません。</li>
          @endforelse
      </ul>
    </main>
    <sectoin>
      <script>
          /* global $ */
          $('.like_button').on('click', (event) => {
            $(event.currentTarget).next().submit();
          })
            
          $(".modal-visible-link").modaal();
      </script>
   </section>
@endsection