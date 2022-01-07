<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\City;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Exception;

class ProjectController extends Controller
{
    public function show()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('project.project.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        $subsidiaries = Subsidiary::get();
        $cities = City::get();
        return view('project.project.edit',[
            'project'=>$project
            ])
        ->with(compact('subsidiaries'))
        ->with(compact('cities'));
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        try{
            $project->update($request->validated());
            return redirect()->route('project.show');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
