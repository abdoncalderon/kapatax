<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\People\StoreStakeholderPersonRequest;
use App\Http\Requests\People\UpdateStakeholderPersonRequest;
use App\Models\Stakeholder;
use App\Models\Person;
use App\Models\StakeholderPerson;
use Exception;

class StakeholderPersonController extends Controller
{
    public function store(StoreStakeholderPersonRequest $request)
    {
        try{
            $person = Person::find($request->person_id);
            if(!$person->isActive()){
                if(is_valid_date_for_admission($request->admissionDate, $request->person_id)){
                    $stakeholderPerson = StakeholderPerson::create($request ->validated());
                    $stakeholderPerson->person->update([
                        'isActive' => '1',
                    ]);
                    return back();
                }else{
                    return back()->withErrors(__('messages.admissionDateNoValid'));
                }
            }else{
                return back()->withErrors(__('messages.userIsActive').' - '.__('messages.admissionsNotPermit'));
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(StakeholderPerson $stakeholderPerson)
    {
       return view('setting.stakeholderPeople.edit')->with(compact('stakeholderPerson'));
    }

    public function update(StakeholderPerson $stakeholderPerson, UpdateStakeholderPersonRequest $request)
    {
        try{
            if(is_null($request->departureDate)){
                if (is_valid_date_for_admission($request->admissionDate, $request->person_id)){
                    $stakeholderPerson->update($request->validated());
                }else{
                    return back()->withErrors(__('messages.admissionDateNoValid'));
                }
            }else{
                if ((is_valid_date_for_admission($request->admissionDate, $stakeholderPerson->person_id))&&(is_valid_date_for_admission($request->departureDate, $stakeholderPerson->person_id))){
                    if (strtotime($request->departureDate)>=strtotime($request->admissionDate)){
                        $request->validated();
                        $stakeholderPerson->update([
                            'admissionDate'=>$request->admissionDate,
                            'departureDate'=>$request->departureDate,
                            'isActive'=>'0',
                        ]);
                        return redirect()->route('people.edit',$stakeholderPerson->person);
                    }else{
                        return back()->withErrors(__('messages.admissionDateNoValid'));
                    }
                }else{
                    return back()->withErrors(__('messages.admissionDateNoValid'));
                }
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
