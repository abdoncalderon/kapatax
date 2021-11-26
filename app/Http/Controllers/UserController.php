<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Role;
use App\Permit;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
<<<<<<< HEAD
use Exception;
=======
>>>>>>> origin/master

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    
    public function create()
    {
        return view('admin.users.create');
    }
    
    public function store(StoreUserRequest $request)
    {
        $request ->validated();
        $user = User::create([
            'name' => $request['name'],
            'user'  => $request['user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show',[
            'user'=>$user
            ]);
    }
    
    public function edit(User $user)
    {
        return view('admin.users.edit',[
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
            return back()->withErrors($e->getMessage());
        }
    }
    
    
}
