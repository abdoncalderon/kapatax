<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Country;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Http\Controllers\Controller;
use Exception;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        $regions = Region::get();
        return view('admin.countries.create')
        ->with(compact('regions'));
    }

    public function store(StoreCountryRequest $request )
    {
        try{
            Country::create($request ->validated());
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Country $country)
    {
        return view('admin.countries.show',[
            'country'=>$country
            ]);
    }

    public function edit(Country $country)
    {
        $regions = Region::get();
               
        return view('admin.countries.edit',[
            'country'=>$country
            ])
        ->with(compact('regions'));
    }
    
    public function update(Country $country, UpdateCountryRequest $request)
    {
        try{
            $country->update($request->validated());
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Country $country)
    {
        try{
            $country->delete();
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }                         
   
}
