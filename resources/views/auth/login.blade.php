@extends('layouts.not_logged_in')

@section('content')
    <div class="auth_content">
        <h1 class="auth_h1">ログイン</h1>
        
            <div class="login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="auth_input">
                            <label>
                                メールアドレス:
                                <input type="email" name="email">
                            </label>
                        </div>
                        <div>
                            <label>
                                パスワード:
                                <input type="password" name="password">
                            </label>
                        </div>
                    <input type="submit" value="ログイン" class="button">
                </form>
            </div>
    </div>
@endsection