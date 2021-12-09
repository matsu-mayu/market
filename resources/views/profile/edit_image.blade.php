@extends('layouts.logged_in')

@section('content')
  <div class="content">
    <h1>{{ $title }}</h1>
    <p>現在の画像</p>
    @if($user->image !== '')
        <img src="{{ \Storage::url($user->image) }}">
    @else
        画像はありません。
    @endif
    <form
        method="POST"
        action="{{ route('profile.update_image', $user) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('patch')
        <div>
            <label>
                画像を選択：
                <input type="file" name="image">
            </label>
        </div>
        <input type="submit" value="更新" class="button">
    </form>
    </div>
@endsection