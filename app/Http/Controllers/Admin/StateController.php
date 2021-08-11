<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\State;
use App\Http\Requests\Admin\StoreStateRequest;
use App\Http\Requests\Admin\UpdateStateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        State::create($request ->validated());
        return redirect()->route('states.index');
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
        $state->update($request->validated());
        return redirect()->route('states.index');
    }
}