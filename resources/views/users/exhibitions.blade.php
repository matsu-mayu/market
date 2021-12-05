@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <a href="{{ route('items.create') }}">新規出品</a>
  <ul>
        @forelse($items as $item)
            <li>
                <div>
                    <a href="{{ route('items.show', $item) }}" enctype="multipart/form-data">
                    <img enctype="multipart/form-data" src="{{ asset('storage/' .$item->image) }}">
                    </a>
                </div>
                <div>
                    商品名：{{ $item->name }}　{{ $item->price }}円
                </div>
                <div>
                    カテゴリー：{{ $item->category->name }}({{ $item->created_at }})
                </div>
                <div>
                    シェイプ：{{ $item->shape->name }}({{ $item->created_at }})
                </div>
                <div>
                    リムタイプ：{{ $item->rim->name }}({{ $item->created_at }})
                </div>
    
                [<a href="{{ route('items.edit', $item) }}">編集</a>]
                [<a href="{{ route('items.edit_image', $item) }}">画像を変更</a>]
                
                <form method="post" class="delete" action="{{ route('items.destroy', $item) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除">
                </form>
                <div>
                    {{ $item->description }}
                </div>
                <div>
                    {{ $item->isSold() ? '売り切れ' : '販売中' }}
                </div>
            </li>  
    @empty
        <li>商品はありません。</li>
    @endforelse
  </ul>
@endsection