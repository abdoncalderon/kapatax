<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Http\Requests\Settings\StoreAreaRequest;
use App\Http\Requests\Settings\UpdateAreaRequest;
use Exception;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::get();
        return view('settings.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('settings.areas.create');
    }

    public function store(StoreAreaRequest $request )
    {
        Area::create($request ->validated());
        return redirect()->route('areas.index');
    }

    public function show(Area $area)
    {
        return view('settings.areas.show',[
            'area'=>$area
            ]);
    }

    public function edit(Area $area)
    {
        return view('settings.areas.edit',[
            'area'=>$area
            ]);
    }
    
    public function update(Area $area, UpdateAreaRequest $request)
    {
        try{
            $area->update($request->validated());
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Area $area)
    {
        try{
            $area->delete();
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 
}
