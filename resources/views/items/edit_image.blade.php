@extends('layouts.logged_in')

@section('content')
    <h1>{{ $title }}</h1>
        <main>
            <div class="content_center">
                <div>
                    <p class="current_img">[ 現在の画像 ]</p>
                        @if($item->image !== '')
                            <img src="{{ \Storage::url($item->image) }}" class="edit_img">
                        @else
                            <p>画像はありません。</p>
                        @endif
                    <form method="POST" action="{{ route('items.update_image', $item) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                            <div>
                                <label class="new_img">
                                    <p class="select_newimg">[ 画像を選択 ]</p>
                                    <input type="file" name="image">
                                </label>
                            </div>
                            <div class="edit_button">
                                <input type="submit" value="更新" class="button">
                            </div>
                    </form>
                </div>
            </div>
        </main>
@endsection