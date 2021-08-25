<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Subsidiary;
use App\Models\City;
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
        $cities = City::get();
        return view('admin.projects.create')
        ->with(compact('subsidiaries'))
        ->with(compact('cities'));
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
        $cities = City::get();
        return view('admin.projects.edit',[
            'project'=>$project
            ])
        ->with(compact('subsidiaries'))
        ->with(compact('cities'));
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
}
