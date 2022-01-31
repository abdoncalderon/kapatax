<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Funct1on;
use App\Models\Project;
use App\Models\ProjectFunction;
use App\Http\Requests\Setting\StoreProjectFunctionRequest;
use Exception;

class ProjectFunctionController extends Controller
{
    public function index(Project $project)
    {
        return view('setting.projectFunctions.index', compact('project'));
    }

    public function create(Project $project)
    {
        if($project->functions->count()>0){
            $functions = Funct1on::select('funct1ons.id as id','funct1ons.name as name')->leftJoin('project_functions','funct1ons.id','=','project_functions.funct1on_id')->whereNull('project_id')->get();
        }else{
            $functions = Funct1on::all();
        }
        return view('setting.projectFunctions.create')
        ->with('project',$project)
        ->with('functions',$functions);
    }

    public function store(StoreProjectFunctionRequest $request, Project $project)
    {
        ProjectFunction::create($request ->validated());
        return redirect()->route('projectFunctions.index',$project);
    }

    public function destroy(ProjectFunction $projectFunction)
    {
        try{
            $project = $projectFunction->project;
            $projectFunction->delete();
            return redirect()->route('projectFunctions.index',$project);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
