<?php

namespace App\Http\Controllers\Materials;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Brand;
use App\Models\Family;
use App\Models\Unity;
use App\Models\Group;
use App\Imports\EquipmentsImport;
use App\Http\Requests\Warehouse\StoreMaterialRequest;
use App\Http\Requests\Warehouse\UpdateMaterialRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::where('project_id',session('current_project_id'))->get();
        return view('materials.materials.index', compact('materials'));
    }

    public function create()
    {
        $brands = Brand::get();
        $unities = Unity::get();
        $groups = Group::get();
        $materials = Material::where('project_id',session('current_project_id'))->get();
        $families = Family::where('project_id',session('current_project_id'))->get();
        
        return view('materials.materials..create')
        ->with(compact('brands'))
        ->with(compact('unities'))
        ->with(compact('groups'))
        ->with(compact('materials'))
        ->with(compact('families'));
    }

    public function store(StoreMaterialRequest $request )
    {
        try{
            Material::create($request ->validated());
            return redirect()->route('materials.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function show(Material $material)
    {
        return view('warehouse.materials.show',compact('material'));
    }

    public function edit(Material $material)
    {
        $brands = Brand::get();
        $unities= Unity::get();
        $groups = Group::get();
        $materials = Material::where('project_id',session('current_project_id'))->get();
        $families = Family::where('project_id',session('current_project_id'))->get();
        return view('materials.materials.edit',[
            'material'=>$material
            ])
        ->with(compact('brands'))
        ->with(compact('unities'))
        ->with(compact('groups'))
        ->with(compact('materials'))
        ->with(compact('families'));
    }
    
    public function update(Material $material, UpdateMaterialRequest $request)
    {
        try{
            $material->update($request->validated());
            return redirect()->route('materials.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Material $material)
    {
        try{
            $material->delete();
            return redirect()->route('materials.index');
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

    public function add(StoreMaterialRequest $request )
    {
        try{
            Material::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function getMaterial(Request $request, $id)
    {
        if($request->ajax())
        {
            $material = Material::find($id);
            return response()->json($material);
        }
    }
       
}
