@extends('layouts.not_logged_in')

@section('content')
<div>
    <h1>ログイン</h1>
    <div class="content_center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
                <div>
                    <label class="login_label">
                        メールアドレス:
                        <input type="email" name="email">
                    </label>
                </div>
                <div>
                    <label class="login_label">
                        パスワード:
                        <input type="password" name="password">
                    </label>
                </div>
        </form>
    </div>
    <div class="login_button">
        <input type="submit" value="ログイン" class="button">
    </div> 
</div>
@endsection