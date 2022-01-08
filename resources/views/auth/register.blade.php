@extends('layouts.not_logged_in')

@section('content')
<div>
    <h1>ユーザー登録</h1>
        <div class="register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div>
                        <label class="register_label">
                            ユーザー名：
                            <input type="text" name="name">
                        </label>
                    </div>
                    
                    <div>
                        <label class="register_label">
                            メールアドレス：
                            <input type="email" name="email">
                        </label>
                    </div>
                    
                    <div>
                        <label class="register_label">
                            パスワード：
                            <input type="password" name="password">
                        </label>
                    </div>
                    
                    <div>
                        <label class="register_label">
                            パスワード（確認用）：
                            <input type="password" name="password_confirmation">
                        </label>
                    </div>
                </form>
        </div>
        <div class="login_button">
            <input type="submit" value="登録" class="button">
        </div>
</div>
@endsection