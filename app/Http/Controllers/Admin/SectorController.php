<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Http\Requests\Admin\StoreSectorRequest;
use App\Http\Requests\Admin\UpdateSectorRequest;
use Exception;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::get();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(StoreSectorRequest $request )
    {
        Sector::create($request ->validated());
        return redirect()->route('sectors.index');
    }

    public function show(Sector $sector)
    {
        return view('admin.sectors.show',[
            'sector'=>$sector
            ]);
    }

    public function edit(Sector $sector)
    {
        return view('admin.sectors.edit',[
            'sector'=>$sector
            ]);
    }
    
    public function update(Sector $sector, UpdateSectorRequest $request)
    {
        try{
            $sector->update($request->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Sector $sector)
    {
        try{
            $sector->delete();
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
