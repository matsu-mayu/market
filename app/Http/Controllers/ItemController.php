<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemEditRequest;
use App\Http\Requests\ItemImageRequest;
use App\Like;
use App\Order;
use App\Category;
use App\Shape;
use App\Rim;
use App\Gender;
use App\Services\FileUploadService;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $user = \Auth::user();
        $items = $user->items;
        return view('items.index', [
            'items' => Item::where('user_id', '!=', \Auth::user()->id)->latest()->get(),
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $shapes = Shape::all();
        $rims = Rim::all();
        $genders = Gender::all();
        return view('items.create', [
            'title' => '商品を出品',
            'categories' => $categories,
            'shapes' => $shapes,
            'rims' => $rims,
            'genders' => $genders,
        ]);
    }

    public function store(ItemRequest $request)
    {
        $path = '';
        $image = $request->file('image');
        if( isset($image) === true) {
            $path = $image->store('photos', 'public');
        }
        
        Item::create([
            'user_id' => \Auth::user()->id,
            'image' => $path,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'shape_id' => $request->shape_id,
            'rim_id' => $request->rim_id,
            'gender_id' => $request->gender_id,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        session()->flash('success', '商品を追加しました');
        return redirect()->route('users.exhibitions', \Auth::user());
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show', [
            'title' => '商品詳細',
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Item::find($id);
        
        $categories = Category::all();
        $shapes = Shape::all();
        $rims = Rim::all();
        $genders = Gender::all();
        
        return view('items.edit', [
            'title' => '商品情報の編集',
            'item' => $item,
            'categories' => $categories,
            'shapes' => $shapes,
            'rims' => $rims,
            'genders' => $genders,
        ]);
    }

    public function update(ItemEditRequest $request, $id)
    {
        $item = Item::find($id);
        $item->update($request->only(['name', 'description', 'price', 'category', 'shape', 'rim', 'gender']));
        session()->flash('success', '商品を編集しました');
        return redirect()->route('items.show', $id);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        
        if($item->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($item->image));
        }
        
        $item->delete();
        \Session::flash('sucdess', '投稿を削除しました');
        return redirect()->route('users.exhibitions', \Auth::user());
    }
    
    public function editImage($id) {
        $item = Item::find($id);
        return view('items.edit_image',[
            'title' => '画像変更画面',
            'item' => $item,
        ]);
    }
    
    public function updateImage($id, ItemImageRequest $request, FileUploadService $service) {
        
        $path = $service->saveImage($request->file('image'));

        $item = Item::find($id);
        
        if($item->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($item->image));
        }
        
        $item->update([
            'image' => $path,    
        ]);
        
        session()->flash('success', '画像を変更しました');
        return redirect()->route('items.show', $id);
    }
    
    public function toggleLike($id) {
        $user = \Auth::user();
        $item = Item::find($id);
        
        if($item->isLikedBy($user)) {
            $item->likes->where('user_id', $user->id)->first()->delete();
            \Session::flash('success', 'お気に入り登録を取り消しました');
        } else {
            Like::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
            \Session::flash('success', 'お気に入り登録しました');
        }
        return redirect('/top');
    }
    
    public function confirm($id) {
        $item = Item::find($id);
        return view('items.confirm', [
            'item' => $item,
        ]);
    }
    
    public function finish($id) {
        $item = Item::find($id);
        Order::create([
            'user_id' => \Auth::user()->id,
            'item_id' => $item->id,
        ]);
        return view('items.finish', [
            'title' => 'ご購入ありがとうございました。',
            'item' => $item,
        ]);
    }
}