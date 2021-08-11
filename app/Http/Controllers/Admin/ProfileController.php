<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.profiles.show',[
            'user'=>$user
            ]);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.profiles.edit',[
            'user'=>$user
            ]);
    }

    public function update($id, UpdateProfileRequest $request)
    {
        $user = User::where('id',$id)->first();
        $avatar = $user->avatar;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $avatar = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/admin/avatars/',$avatar);
        }
        $signature = $user->signature;
        if($request->hasFile('signature'))
        {
            $file = $request->file('signature');
            $signature = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/admin/signatures/',$signature);
        }
        $user->avatar = $avatar;
        $user->signature = $signature;
        $user->update($request->validated());
        return redirect()->route('home');

        
    }
}
