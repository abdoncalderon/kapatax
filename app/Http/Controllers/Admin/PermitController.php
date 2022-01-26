<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\Menu;
use App\Http\Requests\Admin\StorePermitRequest;
use App\Http\Requests\Admin\UpdatePermitRequest;
use Exception;

class PermitController extends Controller
{
    public function index()
    {
        $permits = Permit::get();
        return view('admin.permits.index', compact('permits'));
    }

    public function create()
    {
        $menus = Menu::whereNull('menu_id')->get();
        return view('admin.permits.create')
        ->with(compact('menus'));
    }

    public function store(StorePermitRequest $request )
    {
        try{

        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        Permit::create($request ->validated());
        return redirect()->route('permits.index');
    }

    public function show(Permit $permit)
    {
        return view('admin.permits.show',[
            'permit'=>$permit
            ]);
    }

    public function edit(Permit $permit)
    {
        $menus = Menu::get();
        return view('admin.permits.edit',[
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
            return back()->withErrors($e->getMessage());
        }
    }
    
    public function destroy(Permit $permit)
    {
        try{
            $permit->delete();
            return redirect()->route('permits.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }   
}
