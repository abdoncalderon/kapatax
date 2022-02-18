<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Person;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Exception;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.profiles.show',[
            'user'=>$user,
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
        try{
            $user = User::where('id',$id)->first();
            $person = $user->person;
            $photo = $person->photo;
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $photo = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/people/photos/',$photo);
            }
            $signature = $person->signature;
            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signature = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/people/signatures/',$signature);
            }
            $person->photo = $photo;
            $person->signature = $signature;
            $person->update($request->validated());
            return redirect()->route('home');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
