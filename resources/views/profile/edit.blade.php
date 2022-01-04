@extends('layouts.logged_in')

@section('content')
  <div class="content_short">
    <h1>{{ $title }}</h1>
        <div class="content_center">
            <form method="POST" action="{{ route('profile.update', $user) }}">
                @csrf
                @method('patch')
                <div>
                    <label class="items_label">
                        名前：
                        <input type="text" name="name" value="{{ $user->name }}">
                    </label>
                </div>  
                <div>
                    <label class="items_label">
                        プロフィール：
                        <input type="text" name="profile" value="{{ $user->profile }}">
                    </label>
                </div>
                <div class="items_label">
                    <input type="submit" value="更新" class="button">
                </div>  
            </form>
        </div>
    </div>
@endsection