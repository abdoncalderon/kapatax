<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
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
        return view('project.equipments.create');
    }

    public function store(StoreEquipmentRequest $request )
    {
        try{
            Equipment::create($request ->validated());
            return redirect()->route('equipments.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function show(Equipment $equipment)
    {
        return view('project.equipments.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        return view('project.equipments.edit', compact('equipment'));
    }
    
    public function update(Equipment $equipment, UpdateEquipmentRequest $request)
    {
        try{
            $equipment->update($request->validated());
            return redirect()->route('equipments.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
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
