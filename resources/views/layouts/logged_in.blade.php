@extends('layouts.default')

@section('header')
<header>
    <ul class="header_nav">
        <li>
            <a href="{{ route('items.index') }}">
                <img class="logo" src="/images/icon.png" alt="icon">
            </a>
        </li>
        <li class="header_li">こんにちは、{{ \Auth::user()->name }}さん！</li>
        <li class="header_li"><a href="{{ route('users.exhibitions', \Auth::user()) }}">出品商品一覧</a></li>
        <li class="header_li"><a href="{{ route('likes.index') }}">お気に入り一覧</a></li>
        <li class="header_left">
            <a href="{{ route('users.show', \Auth::user()) }}">プロフィール</a>
        </li>
        <li class="header_right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト" class="button">
            </form>
        </li>
    </ul>
</header>
@endsection