<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Region;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Brand;
use App\Models\Mode1;
use App\Models\Unity;
use App\Imports\RegionsImport;
use App\Imports\CountriesImport;
use App\Imports\StatesImport;
use App\Imports\CitiesImport;
use App\Imports\BrandsImport;
use App\Imports\ModelsImport;
use App\Imports\UnitiesImport;
use Illuminate\Http\Request;
use Exception;

class ParameterController extends Controller
{
    public function index(){
        $regions = Region::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $brands = Brand::all();
        $models = Mode1::all();
        $unities = Unity::all();
        return view('settings.parameters.index')
        ->with(compact('regions'))
        ->with(compact('countries'))
        ->with(compact('states'))
        ->with(compact('cities'))
        ->with(compact('brands'))
        ->with(compact('models'))
        ->with(compact('unities'));

    }

    public function regionsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new RegionsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function countriesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new CountriesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function statesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new StatesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function citiesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new CitiesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function brandsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new BrandsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function modelsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new ModelsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function unitiesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new UnitiesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
