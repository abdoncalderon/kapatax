<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Project;
use App\Models\Department;
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
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        return view('project.sectors.index')
        ->with(compact('sectors'));
    }

    public function create()
    {
        return view('project.sectors.create');
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
        return view('project.sectors.edit',compact('sector'));
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

    public function getDepartments(Request $request, $id)
    {
        if($request->ajax())
        {
            $positions = Department::where('sector_id',$id)->get();
            return response()->json($positions);
        }
    }
}
