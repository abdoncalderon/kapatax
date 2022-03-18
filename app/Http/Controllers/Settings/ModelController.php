<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mode1;
use App\Models\State;
use App\Http\Requests\Settings\StoreModelRequest;
use App\Http\Requests\Settings\UpdateModelRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CountriesImport;
use Exception;

class ModelController extends Controller
{
    public function index()
    {
        $models = Mode1::get();
        return view('settings.models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::get();
        return view('settings.models.create')
        ->with(compact('brands'));
    }

    public function store(StoreModelRequest $request )
    {
        try{
            Mode1::create($request ->validated());
            return redirect()->route('models.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Mode1 $model)
    {
        return view('settings.models.show',[
            'model'=>$model
            ]);
    }

    public function edit(Mode1 $model)
    {
        $brands = Brand::get();
               
        return view('settings.models.edit',[
            'model'=>$model
            ])
        ->with(compact('brands'));
    }
    
    public function update(Mode1 $model, UpdateModelRequest $request)
    {
        try{
            $model->update($request->validated());
            return redirect()->route('models.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Mode1 $model)
    {
        try{
            $model->delete();
            return redirect()->route('models.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }         
    
    public function getStates(Request $request, $id)
    {
        if($request->ajax())
        {
            $states = State::where('model_id',$id)->get();
            return response()->json($states);
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new CountriesImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function add(StoreModelRequest $request )
    {
        try{
            Mode1::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
