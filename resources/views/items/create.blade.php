@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
  <h2>商品追加フォーム</h2>
  <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
      @csrf
      <div>
          <label>
              商品名：
              <input type="text" name="name">
          </label>
      </div>
      <div>
          <label>
              商品説明：
              <input type="text" name="description">
          </label>
      </div>
      <div>
          <label>
              価格：
              <input type="number" name="price">
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
      <div>
          <label>
            サイズ：
              <select name="size_id">
                @foreach($sizes as $size)
                  <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
              </select>    
          </label>
      </div>
      <div>
        <label>
          画像を選択：
          <input type="file" name="image">
        </label>
      </div>
      
      <input type="submit" value="出品">
  </form>
@endsection