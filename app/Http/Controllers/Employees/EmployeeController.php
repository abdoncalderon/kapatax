<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Models\Gender;
use App\Models\Region;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::select('employees.*')
                            ->join('stakeholder_people','employees.stakeholder_person_id','=','stakeholder_people.id')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id', current_user()->project_id)
                            ->where('stakeholders.stakeholder_type_id', 1)
                            ->where('stakeholder_people.isActive',1)
                            ->get();
        return view('people.records.index', compact('employees'));
    }

    public function create()
    {
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        $leaders = Employee::where('isActive',1)->get();
        $genders = Gender::all();
        $regions = Region::all();
        return view('people.records.person')
        ->with(compact('functions'))
        ->with(compact('sectors'))
        ->with(compact('leaders'))
        ->with(compact('genders'))
        ->with(compact('regions'))
        ;
    }

    public function store(StoreEmployeeRequest $request )
    {
        try{
            Employee::create($request ->validated());
            return redirect()->route('employees.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    
        
}
