@extends('layouts.not_logged_in')

@section('content')
<div class="content_center">
    <h1>ログイン</h1>
    <form method="POST" action="{{ route('login') }}">
    <div>
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
    </div>
    <div class="login_button">
        <input type="submit" value="ログイン" class="button">
    </div> 
</form>
</div>
@endsection