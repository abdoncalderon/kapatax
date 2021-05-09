<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Exception;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::get();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(StoreEquipmentRequest $request )
    {
        Equipment::create($request ->validated());
        return redirect()->route('equipments.index');
    }

    public function show(Equipment $equipment)
    {
        return view('equipments.show',[
            'equipment'=>$equipment
            ]);
    }

    public function edit(Equipment $equipment)
    {
        return view('equipments.edit',[
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
