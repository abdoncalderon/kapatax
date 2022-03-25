<?php

namespace App\Http\Controllers\Settings;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\Region;
use App\Models\Parameter;
use App\Http\Requests\Settings\StoreProjectRequest;
use App\Http\Requests\Settings\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\ProjectUser;
use Exception;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('settings.projects.index', compact('projects'));
    }

    public function create()
    {
        $subsidiaries = Subsidiary::get();
        $regions = Region::get();
        return view('settings.projects.create')
        ->with(compact('subsidiaries'))
        ->with(compact('regions'));
    }

    public function store(StoreProjectRequest $request )
    {
        try{
            $project = Project::create($request->validated());
            Parameter::create([ 
                'project_id'=>$project->id,
            ]);
            return redirect()->route('projects.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Project $project)
    {
        return view('settings.projects.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        $subsidiaries = Subsidiary::get();
        $regions = Region::get();
        return view('settings.projects.edit',[
            'project'=>$project
            ])
        ->with(compact('subsidiaries'))
        ->with(compact('regions'));
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        try{
            $project->update($request->validated());
            return redirect()->route('projects.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function activate(Project $project, $value){
        $project->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('projects.index');
    }

    public function lock(Project $project, $value){
        $project->update([
            'isLocked'=>$value,
        ]);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        try{
            $project->delete();
            return redirect()->route('projects.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }  

    
}
