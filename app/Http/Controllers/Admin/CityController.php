<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Region;
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
        $regions = Region::get();
        return view('admin.cities.create')
        ->with(compact('regions'));
    }

    public function store(StoreCityRequest $request )
    {
        try{
            City::create($request ->validated());
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function show(City $city)
    {
        return view('admin.cities.show',[
            'city'=>$city
            ]);
    }

    public function edit(City $city)
    {
        $regions = Region::get();
        return view('admin.cities.edit',[
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
    
    public function destroy(City $city)
    {
        try{
            $city->delete();
            return redirect()->route('cities.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }   

    public function add(StoreCityRequest $request )
    {
        try{
            City::create($request ->validated());
            return back()->withInput();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    
}
