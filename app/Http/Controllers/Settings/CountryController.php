<?php

namespace App\Http\Controllers\Settings;

use App\Models\Region;
use App\Models\Country;
use App\Models\State;
use App\Http\Requests\Settings\StoreCountryRequest;
use App\Http\Requests\Settings\UpdateCountryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CountriesImport;
use Exception;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return view('settings.countries.index', compact('countries'));
    }

    public function create()
    {
        $regions = Region::get();
        return view('settings.countries.create')
        ->with(compact('regions'));
    }

    public function store(StoreCountryRequest $request )
    {
        try{
            Country::create($request ->validated());
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Country $country)
    {
        return view('settings.countries.show',[
            'country'=>$country
            ]);
    }

    public function edit(Country $country)
    {
        $regions = Region::get();
               
        return view('settings.countries.edit',[
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
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Country $country)
    {
        try{
            $country->delete();
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }         

    public function add(StoreCountryRequest $request )
    {
        try{
            Country::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function getStates(Request $request, $id)
    {
        if($request->ajax())
        {
            $states = State::where('country_id',$id)->get();
            return response()->json($states);
        }
    }

    
    
   
}