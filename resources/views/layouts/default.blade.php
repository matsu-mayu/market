<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/modaal.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
        <script src="{{ secure_asset('js/modaal.js') }}"></script>
        
        
    </head>
    <body class="body">
        @yield('header')
        
        {{-- エラーメッセージを出力 --}}
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        
        {{-- 成功メッセージ --}}
        @if (\Session::has('success'))
            <div class="success">
                {{\ Session::get('success') }}
            </div>
        @endif
        
        @yield('content')
    </body>
</html>