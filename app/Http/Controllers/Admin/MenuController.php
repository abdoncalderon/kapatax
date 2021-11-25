<?php

namespace App\Http\Controllers\Admin;


use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Http\Requests\Admin\UpdateMenuRequest;
use Illuminate\Support\Facades\Route;
use Exception;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view('admin.menus.index', compact('menus'));
    }
 
    public function create()
    {
        $menus = Menu::get();
        return view('admin.menus.create', compact('menus'));
    }

    public function store(StoreMenuRequest $request )
    {
        /* Menu::create($request ->validated());
        return redirect()->route('menus.index'); */

        try{
            $request->validated();
            if($this->checkRoute($request->route)){
                Menu::create([
                    'code'=>$request->code,
                    'showName'=>$request->showName,
                    'menu_id'=>$request->menu_id,
                    'route'=>$request->route,
                    'icon'=>$request->icon,
                ]);
                return redirect()->route('menus.index');
            }else{
                return back()->withErrors(__('messages.routeNoExist'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        

    }

    public function show(Menu $menu)
    {
        return view('admin.menus.show',[
            'menu'=>$menu
            ]);
    }

    public function edit(Menu $menu)
    {
        $fathers = Menu::where('id','!=',$menu->id)->get();
        return view('admin.menus.edit',[
            'menu'=>$menu
            ])->with(compact('fathers'));
    }
    
    public function update(Menu $menu, UpdateMenuRequest $request)
    {
        try{
            $menu->update($request->validated());
            return redirect()->route('menus.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    private function checkRoute($route) {
        return Route::has($route);
    }

    public function activate(Menu $menu, $value){
        $menu->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('menus.index');

    }

    public function destroy(Menu $menu)
    {
        try{
            $menu->delete();
            return redirect()->route('menus.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }




}
