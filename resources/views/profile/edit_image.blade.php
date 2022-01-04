@extends('layouts.logged_in')

@section('content')
  <div class="content_short">
    <h1>{{ $title }}</h1>
        <div class="content_center">
            <div>
                <p class="current_img">[ 現在の画像 ]</p>
                    @if($user->image !== '')
                        <img src="{{ \Storage::url($user->image) }}" class="edit_img">
                    @else
                        画像はありません。
                    @endif
                <form method="POST" action="{{ route('profile.update_image', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                        <div>
                            <label class="new_img">
                                [ 画像を選択 ]</br>
                                <input type="file" name="image">
                            </label>
                        </div>
                        <div class="edit_button">
                            <input type="submit" value="更新" class="button">
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection