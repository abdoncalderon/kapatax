<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\State;
use App\Http\Requests\Admin\StoreStateRequest;
use App\Http\Requests\Admin\UpdateStateRequest;
use App\Http\Controllers\Controller;
use Exception;

class StateController extends Controller
{
    public function index()
    {
        $states = State::get();
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('admin.states.create')
        ->with(compact('countries'));
    }

    public function store(StoreStateRequest $request )
    {
        try{
            State::create($request ->validated());
            return redirect()->route('states.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }

    public function show(State $state)
    {
        return view('admin.states.show',[
            'state'=>$state
            ]);
    }

    public function edit(State $state)
    {
        $countries = Country::get();
        return view('admin.states.edit',[
            'state'=>$state
            ])
        ->with(compact('countries'));
    }
    
    public function update(State $state, UpdateStateRequest $request)
    {
        try{
            $state->update($request->validated());
            return redirect()->route('states.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(State $state)
    {
        try{
            $state->delete();
            return redirect()->route('states.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }


}
