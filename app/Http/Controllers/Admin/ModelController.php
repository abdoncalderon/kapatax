<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mode1;
use App\Models\State;
use App\Http\Requests\Admin\StoreModelRequest;
use App\Http\Requests\Admin\UpdateModelRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CountriesImport;
use Exception;

class ModelController extends Controller
{
    public function index()
    {
        $models = Mode1::get();
        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::get();
        return view('admin.models.create')
        ->with(compact('brands'));
    }

    public function store(StoreModelRequest $request )
    {
        try{
            Mode1::create($request ->validated());
            return redirect()->route('models.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function show(Mode1 $model)
    {
        return view('admin.models.show',[
            'model'=>$model
            ]);
    }

    public function edit(Mode1 $model)
    {
        $brands = Brand::get();
               
        return view('admin.models.edit',[
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Mode1 $model)
    {
        try{
            $model->delete();
            return redirect()->route('models.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }
}
