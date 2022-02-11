<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Gender;
use App\Models\Region;
use App\Http\Requests\People\StorePersonRequest;
use App\Http\Requests\People\UpdatePersonRequest;
use App\Models\ProjectUser;
use Exception;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::join('stakeholder_people','people.id','=','stakeholder_people.person_id')
                        ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                        ->where('project_id',session('current_project_id'))
                        ->groupBy('people.id')
                        ->get();
        
        return view('people.people.index')
        ->with(compact('people'));
    }

    public function create()
    {
        $projectUsers = ProjectUser::where('project_id',session('current_project_id'))->get();
        $genders = Gender::all();
        $regions = Region::all();
        return view('people.people.create')
        ->with(compact('genders'))
        ->with(compact('projectUsers'))
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
            
            $person = Person::create([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'fullName'=>$request->fullName,
                'cardId'=>$request->cardId,
                'gender_id'=>$request->gender_id,
                'birthDate'=>$request->birthDate,
                'email'=>$request->email,
                'jobTitle'=>$request->jobTitle,
                'city_id'=>$request->city_id,
                'address'=>$request->address,
                'homePhone'=>$request->homePhone,
                'mobilePhone'=>$request->mobilePhone,
                'photo'=>$photoFileName,
            ]);
            return redirect()->route('people.edit',$person)->with('messages',__('messages.recordsuccessfullystored'));
            // return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
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
        $projectUsers = ProjectUser::where('project_id',session('current_project_id'))->get();
        $genders = Gender::all();
        $regions = Region::all();

        return view('people.people.edit',[
            'person'=>$person
            ])->with(compact('genders'))
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
            $request->validated();
            $person->update([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'fullName'=>$request->fullName,
                'cardId'=>$request->cardId,
                'gender_id'=>$request->gender_id,
                'birthDate'=>$request->birthDate,
                'email'=>$request->email,
                'jobTitle'=>$request->jobTitle,
                'city_id'=>$request->city_id,
                'address'=>$request->address,
                'homePhone'=>$request->homePhone,
                'mobilePhone'=>$request->mobilePhone,
                'photo'=>$photoFileName,
            ]);
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Person $person)
    {
        try{
            $person->delete();
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
