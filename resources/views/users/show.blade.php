@extends('layouts.logged_in')

@section('content')
  <div class="content">
    <h1>{{ $title }}</h1>
    <ul class="Index">
        <li>
            <div class="user_img">
                @if($user->image !== '')
                    <img src="{{ \Storage::url($user->image) }}">
                @else
                    <img src="{{ asset('images/no_image.png') }}">
                @endif
            </div>
            <div>
                <p>[<a href="{{ route('profile.edit_image') }}">画像を変更</a>]</p>
                <dl>
                    <dt>ユーザー名</dt>
                        <dd>{{ $user->name }}さん</dd>
                    <dt>プロフィール</dt>
                        <dd>{{ $user->profile }}</dd>
                </dl>
                <p>[<a href="{{ route('profile.edit') }}">プロフィール編集</a>]</p>
                <p>出品数：{{ $user->items()->count() }}</p>
            </div>
        </li>
    </ul>
    <h2>購入履歴</h2>
    <ul class="Index">
        @forelse($orders as $order)
            <li>
                <div>
                    <a href="{{ route('items.show', $order->item) }}">{{ $order->item->name }}</a>：{{ $order->item->price }}円
                    出品者 {{ $order->item->user->name }}さん
                </div>
            </li>
        @empty
            <li>購入履歴はありません。</li>
        @endforelse
    </ul>
    </div>
@endsection