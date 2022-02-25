<?php

namespace App\Http\Controllers\Setting;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\Region;
use App\Models\Stakeholder;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Exception;

class ProjectController extends Controller
{

    public function index()
    {
        $project_id = session('current_project_id');
        $projects = Project::where('id',$project_id)->get();
        return view('setting.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('setting.project.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        $stakeholders = Stakeholder::all();
        $subsidiaries = Subsidiary::get();
        $regions = Region::get();
        return view('setting.project.edit',[
            'project'=>$project
            ])
        ->with(compact('subsidiaries'))
        ->with(compact('regions'))
        ->with(compact('stakeholders'));
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        try{
            $project->update($request->validated());
            return redirect()->route('project.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
