<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gender;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Settings\StoreUserRequest;
use App\Http\Requests\Settings\UpdateUserRequest;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('settings.users.index', compact('users'));
    }

    
    public function create()
    {
        $genders = Gender::all();
        $regions = Region::all();
        return view('settings.users.create')
        ->with(compact('genders'))
        ->with(compact('regions'));
    }
    
    public function store(StoreUserRequest $request)
    {
        $request ->validated();
        $user = User::create([
            'user'  => $request['user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'person_id' => $request['person_id'],
        ]);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('settings.users.show',[
            'user'=>$user
            ]);
    }
    
    public function edit(User $user)
    {
        return view('settings.users.edit',[
            'user'=>$user
            ]);
    }

    public function update($id, UpdateUserRequest $request)
    {
        $user = User::where('id',$id)->first();
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function activate(User $user, $value){
        $user->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try{
            $user->delete();
            return redirect()->route('users.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function add(StoreUserRequest $request)
    {
        try{
            $request ->validated();
            $user = User::create([
                'user'  => $request['user'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'person_id' => $request['person_id'],
            ]);
            return back()->withInput();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
