<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Person;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use Illuminate\Http\Request;
use Exception;

class PersonController extends Controller
{
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

    public function search(Request $request){
        try{
            $person = Person::where('cardId')->first();
            return redirect()->route('projectPeople.edit',$person)->with('success',__('messages.recordFounded'));
        }catch(Exception $e){
            return back()->withErrors(__('messages.recordNotFound'));
        }
    }
}
