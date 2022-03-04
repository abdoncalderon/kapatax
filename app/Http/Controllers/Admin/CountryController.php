<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Country;
use App\Models\State;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Country $country)
    {
        try{
            $country->delete();
            return redirect()->route('countries.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }         

    public function add(StoreCountryRequest $request )
    {
        try{
            Country::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new CountriesImport,$file);
                return back()->with('success',__('messages.successfullImport'));
            }
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }
    
   
}
