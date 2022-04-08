<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Parameter;
use App\Models\Position;
use App\Models\Department;
use App\Models\Location;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\Project\UpdateParameterRequest;
use App\Imports\FunctionsImport;
use App\Imports\PositionsImport;
use App\Imports\SectorsImport;
use App\Imports\DepartmentsImport;
use App\Imports\ZonesImport;
use App\Imports\LocationsImport;
use App\Imports\FamiliesImport;
use App\Imports\CategoriesImport;
use App\Imports\SubcategoriesImport;
use App\Imports\EquipmentsImport;
use App\Imports\TurnsImport;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Models\Family;
use App\Models\Zone;
use App\Models\Equipment;
use App\Models\Turn;
use Illuminate\Http\Request;
use Exception;

class ParameterController extends Controller
{
    public function index(){

        $projects = Project::where('id','!=',current_user()->project_id)->get();
        $positions = Position::select('positions.*')
                    ->join('funct1ons','positions.function_id','=','funct1ons.id')
                    ->where('funct1ons.project_id',current_user()->project_id)
                    ->get();
        $departments = Department::select('departments.*')
                    ->join('sectors','departments.sector_id','=','sectors.id')
                    ->where('sectors.project_id',current_user()->project_id)
                    ->get();
        $locations = Location::select('locations.*')
                    ->join('zones','locations.zone_id','=','zones.id')
                    ->where('zones.project_id',current_user()->project_id)
                    ->get();
        $categories = Category::select('categories.*')
                    ->join('families','categories.family_id','=','families.id')
                    ->where('families.project_id',current_user()->project_id)
                    ->get();
        $subcategories = Subcategory::select('subcategories.*')
                    ->join('categories','subcategories.category_id','=','categories.id')
                    ->join('families','categories.family_id','=','families.id')
                    ->where('families.project_id',current_user()->project_id)
                    ->get();

        return view('project.parameters.index')->with(compact('projects'))
        ->with(compact('positions'))
        ->with(compact('departments'))
        ->with(compact('locations'))
        ->with(compact('categories'))
        ->with(compact('subcategories'));
    }

    public function update(UpdateParameterRequest $request)
    {
        try{
            $parameter = Parameter::where('project_id',current_user()->project_id)->first();
            $parameter->update($request->validated());
            return redirect()->route('project.parameters.index')->with('success',__('messages.updatedParameters'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }


    public function functionsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new FunctionsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function positionsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new PositionsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function sectorsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new SectorsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function departmentsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new DepartmentsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function zonesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new ZonesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }elseif($import->errors()->isNotEmpty()){
                    return back()->withErrors(__('messages.errorsInImport'));
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function locationsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new LocationsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function familiesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new FamiliesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function categoriesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new CategoriesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function subcategoriesImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new SubcategoriesImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function equipmentsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new EquipmentsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures());
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function turnsImport(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                $import = new TurnsImport;
                $import->import($file);
                if($import->failures()->isNotEmpty()){
                    return back()->withFailures($import->failures())->withErrors(['msg'=>'Error']);
                }else{
                    return back()->with('success',__('messages.successfullImport'));
                }
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function functionsClone(Request $request){
        try{
            $newFunctions = Funct1on::where('project_id',$request->project_id)->get();
            $oldFunctions = Funct1on::where('project_id',current_user()->project_id)->get();
            foreach($oldFunctions as $function){
                $function->delete();
            }
            foreach($newFunctions as $function){
                Funct1on::created([
                    'name'=>$function->name,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function sectorsClone(Request $request){
        try{
            $newSectors = Sector::where('project_id',$request->project_id)->get();
            $oldSectors = Sector::where('project_id',current_user()->project_id)->get();
            foreach($oldSectors as $sector){
                $sector->delete();
            }
            foreach($newSectors as $sector){
                Funct1on::created([
                    'name'=>$sector->name,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function familiesClone(Request $request){
        try{
            $newFamilies = Family::where('project_id',$request->project_id)->get();
            $oldFamilies = Family::where('project_id',current_user()->project_id)->get();
            foreach($oldFamilies as $family){
                $family->delete();
            }
            foreach($newFamilies as $family){
                Funct1on::created([
                    'name'=>$family->name,
                    'code'=>$family->code,
                    'description'=>$family->description,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function zonesClone(Request $request){
        try{
            $newZones = Zone::where('project_id',$request->project_id)->get();
            $oldZones = Zone::where('project_id',current_user()->project_id)->get();
            foreach($oldZones as $zone){
                $zone->delete();
            }
            foreach($newZones as $zone){
                Funct1on::created([
                    'name'=>$zone->name,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function equipmentsClone(Request $request){
        try{
            $newEquipments = Equipment::where('project_id',$request->project_id)->get();
            $oldEquipments = Equipment::where('project_id',current_user()->project_id)->get();
            foreach($oldEquipments as $equipment){
                $equipment->delete();
            }
            foreach($newEquipments as $equipment){
                Funct1on::created([
                    'name'=>$equipment->name,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function turnsClone(Request $request){
        try{
            $newTurns = Turn::where('project_id',$request->project_id)->get();
            $oldTurns = Turn::where('project_id',current_user()->project_id)->get();
            foreach($oldTurns as $turn){
                $turn->delete();
            }
            foreach($newTurns as $turn){
                Funct1on::created([
                    'name'=>$turn->name,
                    'project_id'=>current_user()->project_id,
                ]);
            }
            return back()->with('success',__('messages.successfulCloning'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
