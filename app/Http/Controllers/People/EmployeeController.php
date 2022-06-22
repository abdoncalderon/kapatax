<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\UpdateEmployeeRequest;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Models\StakeholderPerson;
use Exception;

class EmployeeController extends Controller
{
    public function index()
    {
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id', current_user()->project_id)
                            ->where('stakeholders.stakeholder_type_id', 1)
                            ->where('stakeholder_people.isActive',1)
                            ->get();
        return view('people.employees.index', compact('stakeholderPeople'));
    }

    public function edit(StakeholderPerson $stakeholderPerson)
    {
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        $leaders = StakeholderPerson::select('stakeholder_people.*')
                    ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                    ->where('stakeholders.project_id', current_user()->project_id)
                    ->where('stakeholder_people.stakeholder_id',$stakeholderPerson->stakeholder_id)
                    ->where('stakeholder_people.person_id','!=',$stakeholderPerson->person_id)
                    ->where('stakeholder_people.isActive',1)
                    ->get();
        return view('people.employees.edit',compact('stakeholderPerson'))
        ->with(compact('functions'))
        ->with(compact('sectors'))
        ->with(compact('leaders'));
    }

    public function update(StakeholderPerson $stakeholderPerson, UpdateEmployeeRequest $request)
    {
        try{
            $request->validated();

            $isApprover = $request->has('isApprover');

            if($request->hasFile('contractFile'))
            {
                $file = $request->file('contractFile');
                $contractFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/employees/',$contractFileName);
            }else{
                $contractFileName = null;
            }
           
            if ((is_valid_date_for_project($request->hiredSince,current_user()->project)) &&
                (is_valid_date_for_project($request->contractedUntil,current_user()->project)) &&
                (is_valid_date_for_edit_admission($request->hiredSince, $stakeholderPerson)) && 
                (is_valid_date_for_edit_admission($request->contractedUntil, $stakeholderPerson))){
                    if (strtotime($request->contractedUntil)>=strtotime($request->hiredSince)){
                        $stakeholderPerson->update([
                            'position_id'=>$request->position_id,
                            'department_id'=>$request->department_id,
                            'leader_id'=>$request->leader_id,
                            'businessEmail'=>$request->businessEmail,
                            'hiredSince'=>$request->hiredSince,
                            'contractedUntil'=>$request->contractedUntil,
                            'salary'=>$request->salary,
                            'contractFile'=>$contractFileName,
                            'isApprover'=>$isApprover,
                        ]);
                        return redirect()->route('employees.index');
                    }else{
                        return back()->withErrors(__('messages.dateRangeError'));
                    }
            }else{
                return back()->withErrors(__('messages.dateRangeError'));
            }

        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
        
}
