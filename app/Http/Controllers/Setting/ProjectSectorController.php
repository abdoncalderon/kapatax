<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Project;
use App\Models\ProjectSector;
use App\Models\Department;
use App\Http\Requests\Setting\StoreProjectSectorRequest;
use Illuminate\Http\Request;
use Exception;


class ProjectSectorController extends Controller
{
    public function index(Project $project)
    {
        return view('setting.projectSectors.index', compact('project'));
    }

    public function create(Project $project)
    {
        if($project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')->leftJoin('project_sectors','sectors.id','=','project_sectors.sector_id')->whereNull('project_id')->get();
        }else{
            $sectors = Sector::all();
        }
        return view('setting.projectSectors.create')
        ->with('project',$project)
        ->with('sectors',$sectors);
    }

    public function store(StoreProjectSectorRequest $request, Project $project)
    {
        ProjectSector::create($request ->validated());
        return redirect()->route('projectSectors.index',$project);
    }

    public function destroy(ProjectSector $projectSector)
    {
        try{
            $project = $projectSector->project;
            $projectSector->delete();
            return redirect()->route('projectSectors.index',$project);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    public function add(StoreProjectSectorRequest $request )
    {
        try{
            ProjectSector::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function getDepartments(Request $request, $id)
    {
        if($request->ajax())
        {
            $departments = Department::where('project_sector_id',$id)->get();
            return response()->json($departments);
        }
    }

    
}
