<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Project;
use App\Imports\EquipmentsImport;
use App\Http\Requests\Project\StoreEquipmentRequest;
use App\Http\Requests\Project\UpdateEquipmentRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::where('project_id',session('current_project_id'))->get();
        return view('project.equipments.index', compact('equipments'));
    }

    public function create()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('project.equipments.create')
        ->with(compact('project'));
    }

    public function store(StoreEquipmentRequest $request )
    {
        Equipment::create($request ->validated());
        return redirect()->route('equipments.index');
    }

    public function show(Equipment $equipment)
    {
        return view('project.equipments.show',[
            'equipment'=>$equipment
            ]);
    }

    public function edit(Equipment $equipment)
    {
        return view('project.equipments.edit',[
            'equipment'=>$equipment
            ]);
    }
    
    public function update(Equipment $equipment, UpdateEquipmentRequest $request)
    {
        $equipment->update($request->validated());
        return redirect()->route('equipments.index');
    }

    public function destroy(Equipment $equipment)
    {
        try{
            $equipment->delete();
            return redirect()->route('equipments.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new EquipmentsImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function add(StoreEquipmentRequest $request )
    {
        try{
            Equipment::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
