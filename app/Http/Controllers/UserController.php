<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Order;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function exhibitions(User $user)
    {
        $items = \Auth::user()->items()->latest()->get();
        return view('users.exhibitions', [
            'title' => $user->name.'さんの出品商品一覧',
            'items' => $items,
        ]);
    }
    
    public function show(User $user) {
        $user = \Auth::user();
        $orders = \Auth::user()->orders;
        return view('users.show', [
            'title' => 'プロフィール',
            'user'  => $user,
            'orders' => $orders,
        ]);
    }
}