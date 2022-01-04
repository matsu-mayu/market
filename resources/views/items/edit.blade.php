@extends('layouts.logged_in')
 
@section('content')
    <div class="content_short">
        <h1>{{ $title }}</h1>
            <div class="content_center">
                <form method="POST" action="{{ route('items.update', $item) }}">
                    @csrf
                    @method('patch')
                        <div>
                            <label class="items_label">
                                商品名：<input type="text" name="name" value="{{ $item->name }}">
                            </label>
                        </div>
                        <div>
                            <label class="items_label">
                                商品説明：<input type="text" name="description" value="{{ $item->description }}">
                            </label>
                        </div>
                        <div>
                            <label class="items_label">
                                価格：<input type="number" name="price" value="{{ $item->price }}">
                            </label>
                        </div>
                        <div>
                            <label class="items_label">
                                カテゴリー：
                                    <select name="category_id" class="edit_label">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div>
                            <label class="items_label">
                                性別：
                                    <select name="gender_id" class="edit_label">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div>
                            <label class="items_label">
                                シェイプ：
                                    <select name="shape_id" class="edit_label">
                                        @foreach($shapes as $shape)
                                            <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div>
                            <label class="items_label">
                                リムタイプ：
                                    <select name="rim_id" class="edit_label">
                                        @foreach($rims as $rim)
                                            <option value="{{ $rim->id }}">{{ $rim->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div>
                            <label class="items_label">
                                サイズ：
                                    <select name="size_id" class="edit_label">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div>
                            <label class="items_label">
                                カラー：
                                    <select name="color_id" class="edit_label">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>      
                            </label>          
                        </div>
                        <div class="items_label">
                            <input type="submit" value="出品" class="button">
                        </div>
                    </form>
                </div>
    </div>
@endsection