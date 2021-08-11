<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $states = State::get();
        return view('admin.cities.create')
        ->with(compact('states'));
    }

    public function store(StoreCityRequest $request )
    {
        City::create($request ->validated());
        return redirect()->route('cities.index');
    }

    public function show(City $state)
    {
        return view('admin.cities.show',[
            'state'=>$state
            ]);
    }

    public function edit(City $state)
    {
        $states = State::get();
        return view('admin.cities.edit',[
            'state'=>$state
            ])
        ->with(compact('states'));
    }
    
    public function update(City $state, UpdateCityRequest $request)
    {
        $state->update($request->validated());
        return redirect()->route('cities.index');
    }
}
