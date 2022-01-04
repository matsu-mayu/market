@extends('layouts.logged_in')

@section('content')
  <div class="content_short">
    <h1 class="users_title">{{ $title }}</h1>
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
    <h2 class="users_title">購入履歴</h2>
        <ul class="Index">
            @forelse($orders as $order)
                <li>
                    <div>
                        <a href="{{ route('items.show', $order->item) }}">{{ $order->item->name }}</a>：{{ number_format($order->item->price) }}円
                        出品者 {{ $order->item->user->name }}さん
                    </div>
                </li>
            @empty
                <li>購入履歴はありません。</li>
            @endforelse
        </ul>
    </div>
@endsection