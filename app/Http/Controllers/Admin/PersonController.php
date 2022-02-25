<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Gender;
use App\Models\Region;
use App\Models\User;
use App\Models\StakeholderPerson;
use App\Http\Requests\Admin\StorePersonRequest;
use App\Http\Requests\Admin\UpdatePersonRequest;
use Exception;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::get();
        return view('admin.people.index')
        ->with(compact('people'));
    }

    public function create()
    {
        $genders = Gender::all();
        $regions = Region::all();
        return view('admin.people.create')
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
                'email'=>$request->email,
                'city_id'=>$request->city_id,
                'address'=>$request->address,
                'homePhone'=>$request->homePhone,
                'mobilePhone'=>$request->mobilePhone,
                'photo'=>$photoFileName,
                'signature'=>$signatureFileName,
            ]);
            return redirect()->route('people.edit',$person)->with('success',__('messages.recordsuccessfullystored'));
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
   

    public function edit(Person $person)
    {
        
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->where('stakeholder_people.person_id',$person->id)
                            ->get();
        $users = User::where('person_id',$person->id)->get();
        $genders = Gender::all();
        $regions = Region::all();
        return view('admin.people.edit',[
            'person'=>$person
            ])->with(compact('genders'))
            ->with(compact('stakeholderPeople'))
            ->with(compact('users'))
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
                'email'=>$request->email,
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
    
}
