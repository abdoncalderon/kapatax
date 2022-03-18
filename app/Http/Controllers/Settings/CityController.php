<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Region;
use App\Http\Requests\Settings\StoreCityRequest;
use App\Http\Requests\Settings\UpdateCityRequest;

use Exception;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('settings.cities.index', compact('cities'));
    }

    public function create()
    {
        $regions = Region::get();
        return view('settings.cities.create')
        ->with(compact('regions'));
    }

    public function store(StoreCityRequest $request )
    {
        try{
            City::create($request ->validated());
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(City $city)
    {
        return view('settings.cities.show',[
            'city'=>$city
            ]);
    }

    public function edit(City $city)
    {
        $regions = Region::get();
        return view('settings.cities.edit',[
            'city'=>$city
            ])
        ->with(compact('regions'));
    }
    
    public function update(City $city, UpdateCityRequest $request)
    {
        try{
            $city->update($request->validated());
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function destroy(City $city)
    {
        try{
            $city->delete();
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }   

    public function add(StoreCityRequest $request )
    {
        try{
            City::create($request ->validated());
            return back()->withInput();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    
}
