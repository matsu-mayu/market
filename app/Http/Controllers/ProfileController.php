<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Services\FileUploadService;
use App\Item;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit() {
        $user = \Auth::user();
        return view('profile.edit', [
            'title' => 'プロフィール編集',
            'user' => $user,
        ]);
    }
    
    public function update(ProfileRequest $request) {
        $user = \Auth::user();
        $user->update($request->only([
            'user_name', 'profile',
        ]));
        
        session()->flash('success', 'プロフィールを編集しました');
        return redirect()->route('users.show', $user);
    }
    
    public function editImage() {
        $user = \Auth::user();
        return view('profile.edit_image', [
            'title' => '画像変更画面',
            'user' => $user,
        ]);
    }
    
    public function updateImage(ProfileImageRequest $request, FileUploadService $service) {
        $path = $service->saveImage($request->file('image'));
        
        $user = \Auth::user();
        
        if($user->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }
        
        $user->update([
            'image' => $path,
        ]);
        
        session()->flash('success', '画像を変更しました');
        return redirect()->route('users.show', $user);
    }
}
