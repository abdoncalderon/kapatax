<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\Region;
use App\Models\Stakeholder;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Exception;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::where('id',session('current_project_id'))->get();
        return view('project.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('project.project.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        $stakeholders = Stakeholder::where('project_id',$project->id)->get();
        $regions = Region::get();
        return view('project.project.edit',[
            'project'=>$project
            ])
        ->with(compact('regions'))
        ->with(compact('stakeholders'));
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        try{
            $project->update($request->validated());
            return redirect()->route('project.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
