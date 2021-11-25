<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Http\Requests\Admin\StoreAreaRequest;
use App\Http\Requests\Admin\UpdateAreaRequest;
use Exception;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(StoreAreaRequest $request )
    {
        Area::create($request ->validated());
        return redirect()->route('areas.index');
    }

    public function show(Area $area)
    {
        return view('admin.areas.show',[
            'area'=>$area
            ]);
    }

    public function edit(Area $area)
    {
        return view('admin.areas.edit',[
            'area'=>$area
            ]);
    }
    
    public function update(Area $area, UpdateAreaRequest $request)
    {
        try{
            $area->update($request->validated());
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Area $area)
    {
        try{
            $area->delete();
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
