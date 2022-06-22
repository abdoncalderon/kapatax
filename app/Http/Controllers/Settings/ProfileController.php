<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProjectUser;
use App\Models\Person;
use App\Http\Requests\Settings\UpdateProfileRequest;
use Exception;

class ProfileController extends Controller
{
    public function show($id)
    {
        $projectUser = ProjectUser::find($id);
        return view('settings.profiles.show')->with(compact('projectUser'));

    }

    public function edit($id)
    {
        $projectUser = ProjectUser::find($id);
        return view('settings.profiles.edit')->with(compact('projectUser'));
    }

    public function update($id, UpdateProfileRequest $request)
    {
        try{
            $user = User::find($id);
            $person = $user->person;
            $photo = $person->photo;
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $photo = time().$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/photos/',$photo);
            }
            $signature = $person->signature;
            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signature = time().$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/signatures/',$signature);
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
