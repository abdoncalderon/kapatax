<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use Exception;

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
        try{

        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        City::create($request ->validated());
        return redirect()->route('cities.index');
    }

    public function show(City $city)
    {
        return view('admin.cities.show',[
            'city'=>$city
            ]);
    }

    public function edit(City $city)
    {
        $states = State::get();
        return view('admin.cities.edit',[
            'city'=>$city
            ])
        ->with(compact('states'));
    }
    
    public function update(City $city, UpdateCityRequest $request)
    {
        try{
            $city->update($request->validated());
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    public function destroy(City $city)
    {
        try{
            $city->delete();
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }   
}
