@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <h2>商品追加フォーム</h2>
  <form method="POST" action="{{ route('items.update', $item) }}">
      @csrf
      @method('patch')
        
        <div>
            <label>
                商品名：
                <input type="text" name="name" value="{{ $item->name }}">
            </label>
        </div>
        <div>
            <label>
                商品説明：
                <input type="text" name="description" value="{{ $item->description }}">
            </label>
        </div>
        <div>
            <label>
                価格：
                <input type="number" name="price" value="{{ $item->price }}">
            </label>
        </div>
        <div>
                <label>
                  カテゴリー：
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>      
                </label>          
        </div>
        <div>
                <label>
                  性別：
                    <select name="gender_id">
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                        @endforeach
                    </select>      
                </label>          
        </div>
        <div>
                <label>
                  シェイプ：
                    <select name="shape_id">
                        @foreach($shapes as $shape)
                            <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                        @endforeach
                    </select>      
                </label>          
        </div>
        <div>
                <label>
                  リムタイプ：
                    <select name="rim_id">
                        @foreach($rims as $rim)
                            <option value="{{ $rim->id }}">{{ $rim->name }}</option>
                        @endforeach
                    </select>      
                </label>          
        </div>
        
      
      <input type="submit" value="出品">
  </form>
@endsection