@extends('layouts.logged_in')

@section('content')
    <h1>{{ $title }}</h1>
    <ul class="Index">
        <li>
            <div>
                @if($user->image !== '')
                    <img src="{{ \Storage::url($user->image) }}">
                @else
                    <img src="{{ asset('images/no_image.png') }}">
                @endif
                <a href="{{ route('profile.edit_image') }}">画像を変更</a>
            </div>
            <div>
                {{ $user->name }}さん
                <a href="{{ route('profile.edit') }}">プロフィール編集</a>
            </div>
            <div>
                プロフィール：{{ $user->profile }}
            </div>
            <div>
                出品数：{{ $user->items()->count() }}
            </div>
        </li>
    </ul>
    <h2>購入履歴</h2>
    <ul>
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
@endsection