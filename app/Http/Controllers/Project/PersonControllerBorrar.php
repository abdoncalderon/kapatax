<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Gender;
use App\Models\Region;
use App\Models\User;
use App\Models\StakeholderPerson;
use App\Http\Requests\Project\StorePersonRequest;
use App\Http\Requests\Project\UpdatePersonRequest;
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
        
        return view('project.people.index')
        ->with(compact('people'));
    }

    public function create()
    {
        $genders = Gender::all();
        $regions = Region::all();
        return view('project.people.create')
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
                $file->move(public_path().'/documents/people/photos/',$photoFileName);
            }else{
                $photoFileName = 'noPhoto.png';
            }

            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signatureFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/signatures/',$signatureFileName);
            }else{
                $signatureFileName = 'noSignature.png';
            }
            
            $projectPerson = Person::create([
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
            return redirect()->route('projectPeople.edit',$projectPerson)->with('success',__('messages.recordsuccessfullystored'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
   

    public function edit(Person $projectPerson)
    {
        
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->where('stakeholder_people.person_id',$projectPerson->id)
                            ->get();
        $users = User::where('person_id',$projectPerson->id)->get();
        $genders = Gender::all();
        $regions = Region::all();
        return view('project.people.edit',[
            'projectPerson'=>$projectPerson
            ])->with(compact('genders'))
            ->with(compact('stakeholderPeople'))
            ->with(compact('users'))
            ->with(compact('regions'));
    }
    
    public function update($projectPerson, UpdatePersonRequest $request)
    {
        try{
            $person = Person::find($projectPerson);
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $photoFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/photos/',$photoFileName);
            }else{
                $photoFileName = 'noPhoto.png';
            }

            if($request->hasFile('signature'))
            {
                $file = $request->file('signature');
                $signatureFileName = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/people/signatures/',$signatureFileName);
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
            return redirect()->route('projectPeople.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Person $person)
    {
        try{
            $person->delete();
            return redirect()->route('projectPeople.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function search(Request $request){
        try{
            $person = Person::where($request->field,$request->value)->first();
            return redirect()->route('projectPeople.edit',$person)->with('success',__('messages.recordFounded'));
        }catch(Exception $e){
            return back()->withErrors(__('messages.recordNotFound'));
        }
    }
}