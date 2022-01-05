@extends('layouts.logged_in')
 
@section('content')
    <h1>{{ $title }}</h1>
        <div>
            <ul class="index_flex">
                <li>
                    @forelse($items as $item)
                        <div class="items_border items_margin">
                            <div class="items_exhimg">
                                <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                                    <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
                                </a>
                            </div>
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
                                
                                <div class="sold_sell">
                                    {{ $item->isSold() ? '売り切れ' : '販売中' }}
                                </div>

                                [<a href="{{ route('items.edit', $item) }}">編集</a>]
                                [<a href="{{ route('items.edit_image', $item) }}">画像を変更</a>]
                            
                                <form method="post" action="{{ route('items.destroy', $item) }}">
                                    @csrf
                                    @method('delete')
                                    <input class="button delete_button" type="submit" value="削除">
                                </form>
                            </div>
                </li>  
                    @empty
                        <li>商品はありません。</li>
                    @endforelse
            </ul>
        </div>
        <div class="button_margin">
            <a href="{{ route('items.create') }}" class="button_create">出品する</a>
        </div>
@endsection