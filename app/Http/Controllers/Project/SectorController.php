<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Project;
use App\Imports\SectorsImport;
use App\Http\Requests\Project\StoreSectorRequest;
use App\Http\Requests\Project\UpdateSectorRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class SectorController extends Controller
{
    public function index()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.sectors.index', compact('project'));
    }

    public function create()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.sectors.create')
        ->with(compact('project'));
    }

    public function store(StoreSectorRequest $request )
    {
        try{
            Sector::create($request ->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Sector $sector)
    {
        return view('project.sectors.show',[
            'sector'=>$sector
            ]);
    }

    public function edit(Sector $sector)
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.sectors.edit',[
            'sector'=>$sector
            ])->with(compact('project'));
    }
    
    public function update(Sector $sector, UpdateSectorRequest $request)
    {
        try{
            $sector->update($request->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Sector $sector)
    {
        try{
            $sector->delete();
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
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
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function add(StoreSectorRequest $request )
    {
        try{
            Sector::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
