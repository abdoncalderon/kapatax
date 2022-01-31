<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Project;
use App\Http\Requests\Setting\StoreEquipmentRequest;
use App\Http\Requests\Setting\UpdateEquipmentRequest;
use Exception;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::get();
        return view('setting.equipments.index', compact('equipments'));
    }

    public function create()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('setting.equipments.create')
        ->with(compact('project'));
    }

    public function store(StoreEquipmentRequest $request )
    {
        Equipment::create($request ->validated());
        return redirect()->route('equipments.index');
    }

    public function show(Equipment $equipment)
    {
        return view('setting.equipments.show',[
            'equipment'=>$equipment
            ]);
    }

    public function edit(Equipment $equipment)
    {
        return view('setting.equipments.edit',[
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
            return back()->withErrors($e->getMessage());
        }
    }
}
