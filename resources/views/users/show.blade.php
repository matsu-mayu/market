@extends('layouts.logged_in')

@section('content')
    <h1>{{ $title }}</h1>
        <div>
            <ul class="Index">
                <li class="profile_flex">
                    <div class="user_img">
                        @if($user->image !== '')
                            <img src="{{ \Storage::url($user->image) }}">
                        @else
                            <img src="{{ asset('images/no_image.png') }}">
                        @endif
                        <p>[<a href="{{ route('profile.edit_image') }}">画像を変更</a>]</p>
                    </div>
                    <div class="profile_info">
                        <dl>
                            <dt>ユーザー名</dt>
                                <dd>{{ $user->name }}さん</dd>
                            <dt>プロフィール</dt>
                                <dd>{{ $user->profile }}</dd>
                        </dl>
                        <p>出品数：{{ $user->items()->count() }}</p>
                        <p>[<a href="{{ route('profile.edit') }}">プロフィール編集</a>]</p>
                    </div>
                </li>
            </ul>
        </div>
    
        <div>
            <h2>購入履歴</h2>
                <ul class="index_flex">
                    @forelse($orders as $order)
                        <li class="items_border items_margin">
                            <div>
                                <a href="{{ route('items.show', $order->item) }}" enctype="multipart/form-data">
                                <img class="items_img" enctype="multipart/form-data" src="{{ asset('storage/' .$order->item->image) }}">
                                </a>
                            </div>
                                <dl class="items_flex">
                                <div class="items_info">
                                    <dt>商品名</dt>
                                    <dd>{{ $order->item->name }}</dd>
                                    <dt>カテゴリー</dt>
                                    <dd>{{ $order->item->category->name }}</dd>
                                    <dt>性別</dt>
                                    <dd>{{ $order->item->gender->name }}</dd>
                                    <dt>シェイプ</dt>
                                    <dd>{{ $order->item->shape->name }}</dd>
                                </div>
                                <div class="items_info">
                                    <dt>リムタイプ</dt>
                                    <dd>{{ $order->item->rim->name }}</dd>
                                    <dt>サイズ</dt>
                                    <dd>{{ $order->item->size->name }}</dd>
                                    <dt>カラー</dt>
                                    <dd>{{ $order->item->color->name }}</dd>
                                    <dt>価格</dt>
                                    <dd>{{ number_format($order->item->price) }}円</dd>
                                </div>
                        </li>
                    @empty
                        <li>購入履歴はありません。</li>
                    @endforelse
                </ul>
        </div>
@endsection