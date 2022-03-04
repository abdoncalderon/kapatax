<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Gender;
use App\Models\Region;
use App\Models\User;
use App\Models\ProjectUser;
use App\Models\StakeholderPerson;
use App\Http\Requests\People\StorePersonRequest;
use App\Http\Requests\People\UpdatePersonRequest;
use Illuminate\Http\Request;
use Exception;


class PersonController extends Controller
{
    public function index()
    {
        $people = Person::select('people.*')
                        ->join('stakeholder_people','people.id','=','stakeholder_people.person_id')
                        ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                        ->where('project_id',session('current_project_id'))
                        ->groupBy('people.id')
                        ->get();
        
        return view('people.people.index')
        ->with(compact('people'));
    }

    public function create()
    {
        $genders = Gender::all();
        $regions = Region::all();
        return view('people.people.create')
        ->with(compact('genders'))
        ->with(compact('regions'));
    }

    public function store(StorePersonRequest $request)
    {
        try{
            $request ->validated();
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $photoFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/people/photos/',$photoFileName);
            }else{
                $photoFileName = 'noPhoto.png';
            }

            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signatureFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/people/signatures/',$signatureFileName);
            }else{
                $signatureFileName = 'noSignature.png';
            }
            
            $person = Person::create([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'fullName'=>$request->fullName,
                'cardId'=>$request->cardId,
                'gender_id'=>$request->gender_id,
                'birthDate'=>$request->birthDate,
                'jobTitle'=>$request->jobTitle,
                'city_id'=>$request->city_id,
                'address'=>$request->address,
                'homePhone'=>$request->homePhone,
                'mobilePhone'=>$request->mobilePhone,
                'photo'=>$photoFileName,
                'signature'=>$signatureFileName,
            ]);
            return redirect()->route('people.edit',$person)->with('messages',__('messages.recordsuccessfullystored'));
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function show(Person $person)
    {
        return view('people.people.show',[
            'person'=>$person
            ]);
    }

    public function edit(Person $person)
    {
        
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->where('stakeholder_people.person_id',$person->id)
                            ->get();
        if(!$person->user==null){
            $projectUsers = ProjectUser::where('user_id',$person->user->id)->where('project_id',session('current_project_id'))->get();
        }else{
            $projectUsers = ProjectUser::where('user_id','0')->where('project_id',session('current_project_id'))->get();
        }
        $genders = Gender::all();
        $regions = Region::all();
        return view('people.people.edit',[
            'person'=>$person
            ])->with(compact('genders'))
            ->with(compact('stakeholderPeople'))
            ->with(compact('projectUsers'))
            ->with(compact('regions'));
    }
    
    public function update(Person $person, UpdatePersonRequest $request)
    {
        try{
            
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $photoFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/people/photos/',$photoFileName);
            }else{
                $photoFileName = 'noPhoto.png';
            }

            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signatureFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/people/signatures/',$signatureFileName);
            }else{
                $signatureFileName = 'noSignature.png';
            }

            $request->validated();
            $person->update([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'fullName'=>$request->fullName,
                'cardId'=>$request->cardId,
                'gender_id'=>$request->gender_id,
                'birthDate'=>$request->birthDate,
                'jobTitle'=>$request->jobTitle,
                'city_id'=>$request->city_id,
                'address'=>$request->address,
                'homePhone'=>$request->homePhone,
                'mobilePhone'=>$request->mobilePhone,
                'photo'=>$photoFileName,
                'signature'=>$signatureFileName,
            ]);
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Person $person)
    {
        try{
            $person->delete();
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function search(Request $request){
        try{
            $person = Person::where($request->field,$request->value)->first();
            return redirect()->route('people.edit',$person)->with('success',__('messages.recordFounded'));
        }catch(Exception $e){
            return back()->withErrors(__('messages.recordNotFound'));
        }
    }
}