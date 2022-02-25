<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Exception;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('agreement.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('agreement.projects.create');
    }

    public function store(StoreProjectRequest $request )
    {
        Project::create($request ->validated());
        
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('agreement.projects.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        return view('agreement.projects.edit',[
            'project'=>$project
            ]);
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        try{
            $filename1=$request->logofilename1;
            $filename2=$request->logofilename2;
            $filename3=$request->logofilename3;
            $filename4=$request->logofilename4;

            if($request->hasFile('logo1'))
            {
                $file = $request->file('logo1');
                $filename1 = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/logos/',$filename1);
            }
            if($request->hasFile('logo2'))
            {
                $file = $request->file('logo2');
                $filename2 = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/logos/',$filename2);
            }
            if($request->hasFile('logo3'))
            {
                $file = $request->file('logo3');
                $filename3 = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/logos/',$filename3);
            }
            if($request->hasFile('logo4'))
            {
                $file = $request->file('logo4');
                $filename4 = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/logos/',$filename4);
            }

            $request ->validated();
            $project->update([
                'name'=>$request->name,
                'datestart'=>$request->datestart,
                'datefinish'=>$request->datefinish,
                'logofilename1'=>$filename1,
                'logofilename2'=>$filename2,
                'logofilename3'=>$filename3,
                'logofilename4'=>$filename4,
            ]);
            return redirect()->route('projects.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
