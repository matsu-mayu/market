@extends('layouts.logged_in')

@section('content')
  <div class="content">
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ route('profile.update', $user) }}">
        @csrf
        @method('patch')
        <div>
            <label>
                名前：
                <input type="text" name="name" value="{{ $user->name }}">
            </label>
            <label>
                プロフィール：
                <input type="text" name="profile" value="{{ $user->profile }}">
            </label>
        </div>
        <input type="submit" value="更新" class="button">
    </form>
    </div>
@endsection