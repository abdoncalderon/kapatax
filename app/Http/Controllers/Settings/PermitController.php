<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\Menu;
use App\Http\Requests\Settings\StorePermitRequest;
use App\Http\Requests\Settings\UpdatePermitRequest;
use Exception;

class PermitController extends Controller
{
    public function index()
    {
        $permits = Permit::get();
        return view('settings.permits.index', compact('permits'));
    }

    public function create()
    {
        $menus = Menu::whereNull('menu_id')->get();
        return view('settings.permits.create')
        ->with(compact('menus'));
    }

    public function store(StorePermitRequest $request )
    {
        try{
            $request ->validated();
            $permit = Permit::create([
                'name'=>$request->name,
                'menu_id'=>$request->menu_id,
            ]);
            assign_roles_to_permit($permit);
            return redirect()->route('permits.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function show(Permit $permit)
    {
        return view('settings.permits.show',[
            'permit'=>$permit
            ]);
    }

    public function edit(Permit $permit)
    {
        $menus = Menu::get();
        return view('settings.permits.edit',[
            'permit'=>$permit
            ])
        ->with(compact('menus'));
    }
    
    public function update(Permit $permit, UpdatePermitRequest $request)
    {
        try{
            $permit->update($request->validated());
            return redirect()->route('permits.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function destroy(Permit $permit)
    {
        try{
            $permit->delete();
            return redirect()->route('permits.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }   
}
