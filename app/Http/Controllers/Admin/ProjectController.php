<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\City;
use App\Models\Region;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Exception;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $subsidiaries = Subsidiary::get();
        $regions = Region::get();
        return view('admin.projects.create')
        ->with(compact('subsidiaries'))
        ->with(compact('regions'));
    }

    public function store(StoreProjectRequest $request )
    {
        try{
            Project::create($request ->validated());
            return redirect()->route('projects.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Project $project)
    {
        return view('admin.projects.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        $subsidiaries = Subsidiary::get();
        $regions = Region::get();
        return view('admin.projects.edit',[
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
            return back()->withErrors($e->getMessage());
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
            return back()->withErrors($e->getMessage());
        }
    }  

    
}
