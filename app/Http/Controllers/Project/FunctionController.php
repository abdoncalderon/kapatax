<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Funct1on;
use App\Models\Project;
use App\Imports\FunctionsImport;
use App\Http\Requests\Project\StoreFunctionRequest;
use App\Http\Requests\Project\UpdateFunctionRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class FunctionController extends Controller
{
    public function index()
    {
        $functions = Funct1on::where('project_id',session('current_project_id'))->get();
        return view('project.functions.index', compact('functions'));
    }

    public function create()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.functions.create')
        ->with(compact('project'));
    }

    public function store(StoreFunctionRequest $request )
    {
        try{
            Funct1on::create($request ->validated());
            return redirect()->route('functions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Funct1on $function)
    {
        return view('project.functions.show',[
            'function'=>$function
            ]);
    }

    public function edit(Funct1on $function)
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.functions.edit',[
            'function'=>$function
            ])->with(compact('project'));
    }
    
    public function update(Funct1on $function, UpdateFunctionRequest $request)
    {
        try{
            $function->update($request->validated());
            return redirect()->route('functions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Funct1on $function)
    {
        try{
            $function->delete();
            return redirect()->route('functions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new FunctionsImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function add(StoreFunctionRequest $request )
    {
        try{
            Funct1on::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
