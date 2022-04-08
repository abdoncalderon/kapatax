<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\StakeholderPerson;
use App\Models\Person;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Http\Requests\People\StoreStakeholderPersonRequest;
use App\Http\Requests\People\UpdateStakeholderPersonRequest;

use Exception;

use Illuminate\Http\Request;

class StakeholderPersonController extends Controller
{
    public function index(Person $person){
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholder_people.person_id',$person->id)
                            ->where('stakeholders.project_id',current_user()->project_id)
                            ->get();
        return view('people.stakeholderPeople.index',compact('person'))
        ->with(compact('stakeholderPeople'));
    }

    public function create(Person $person)
    {
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        return view('people.stakeholderPeople.create',compact('person'))
        ->with(compact('functions'))
        ->with(compact('sectors'));
    }

    public function store(StoreStakeholderPersonRequest $request)
    {
        try{
            $person = Person::find($request->person_id);
            if(!is_active_stakeholder_person($person)){
                if(is_valid_date_for_new_admission($request->admissionDate, $request->person_id)&&(is_valid_date_for_project($request->admissionDate, current_user()->project))){
                    $stakeholderPerson = StakeholderPerson::create($request ->validated());
                    $stakeholderPerson->person->update([
                        'isActive' => '1',
                    ]);
                    return redirect()->route('stakeholderPeople.index',$stakeholderPerson->person);
                }else{
                    return back()->withErrors(__('messages.admissionDateNoValid'));
                }
            }else{
                return back()->withErrors(__('messages.userIsActive').' - '.__('messages.admissionNotPermit'));
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(StakeholderPerson $stakeholderPerson)
    {
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        return view('people.stakeholderPeople.edit')->with(compact('stakeholderPerson'))
        ->with(compact('functions'))
        ->with(compact('sectors'));
    }

    public function update(StakeholderPerson $stakeholderPerson, UpdateStakeholderPersonRequest $request)
    {
        try{
            if(is_null($request->departureDate)){
                if ((is_valid_date_for_edit_admission($request->admissionDate, $stakeholderPerson))&&(is_valid_date_for_project($request->admissionDate,current_user()->project))){
                    $stakeholderPerson->update($request->validated());
                    return redirect()->route('stakeholderPeople.index',$stakeholderPerson->person);
                }else{
                    return back()->withErrors(__('messages.admissionDateNoValid'));
                }
            }else{
                if ((is_valid_date_for_edit_admission($request->admissionDate, $stakeholderPerson)) &&
                    (is_valid_date_for_edit_admission($request->departureDate, $stakeholderPerson)) &&
                    (is_valid_date_for_project($request->admissionDate,current_user()->project)) &&
                    (is_valid_date_for_project($request->departureDate,current_user()->project))
                    ){
                    if (strtotime($request->departureDate)>=strtotime($request->admissionDate)){
                        $request->validated();
                        
                        $stakeholderPerson->update([
                            'admissionDate'=>$request->admissionDate,
                            'departureDate'=>$request->departureDate,
                            'position_id'=>$request->position_id,
                            'department_id'=>$request->department_id,
                            'isActive'=>'0',
                        ]);
                        return redirect()->route('stakeholderPeople.index',$stakeholderPerson->person);
                    }else{
                        return back()->withErrors(__('messages.dateRangeError2'));
                    }
                }else{
                    return back()->withErrors(__('messages.dateRangeError1'));
                }
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function getStakeholderPerson(Request $request, $cardId)
    {
        if($request->ajax())
        {
            $stakeholderPerson = StakeholderPerson::select('stakeholder_people.id as stakeholderPersonId','people.cardId as cardId','people.fullName as fullName')
                        ->join('people','stakeholder_people.person_id','=','people.id')
                        ->where('people.cardId',$cardId)
                        ->first();
            return response()->json($stakeholderPerson);
        }
    }

}
