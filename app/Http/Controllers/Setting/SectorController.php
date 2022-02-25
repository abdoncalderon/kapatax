<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Project;
use App\Imports\SectorsImport;
use App\Http\Requests\Setting\StoreSectorRequest;
use App\Http\Requests\Setting\UpdateSectorRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class SectorController extends Controller
{
    public function index()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.sectors.index', compact('project'));
    }

    public function create()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.sectors.create')
        ->with(compact('project'));
    }

    public function store(StoreSectorRequest $request )
    {
        try{
            Sector::create($request ->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function show(Sector $sector)
    {
        return view('setting.sectors.show',[
            'sector'=>$sector
            ]);
    }

    public function edit(Sector $sector)
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.sectors.edit',[
            'sector'=>$sector
            ])->with(compact('project'));
    }
    
    public function update(Sector $sector, UpdateSectorRequest $request)
    {
        try{
            $sector->update($request->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Sector $sector)
    {
        try{
            $sector->delete();
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function import(Request $request){
        try{
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new SectorsImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }

    public function add(StoreSectorRequest $request )
    {
        try{
            Sector::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
