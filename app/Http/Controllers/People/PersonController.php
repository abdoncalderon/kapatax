<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Person;
use App\Models\User;
use App\Models\Funct1on;
use App\Models\Sector;
use App\Http\Requests\People\StoreNewPersonRequest;
use App\Http\Requests\People\StoreExistPersonRequest;
use App\Http\Requests\People\UpdatePersonRequest;
use App\Models\StakeholderPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class PersonController extends Controller
{
    public function index()
    {
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id', current_user()->project_id)
                            ->groupBy('stakeholder_people.person_id')
                            ->get();
        return view('people.person.index', compact('stakeholderPeople'));
    }

    public function createNew()
    {
        $genders = Gender::all();
        $regions = Region::all();
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        return view('people.person.createNew')
        ->with(compact('functions'))
        ->with(compact('sectors'))
        ->with(compact('genders'))
        ->with(compact('regions'));
    }

    public function createExist(Person $person)
    {
        $genders = Gender::all();
        $regions = Region::all();
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        $sectors = Sector::where('project_id',current_user()->project_id)->get();
        return view('people.person.createExist',compact('person'))
        ->with(compact('functions'))
        ->with(compact('sectors'))
        ->with(compact('genders'))
        ->with(compact('regions'));
    }

    public function storeNew(StoreNewPersonRequest $request)
    {
        try{
            $request ->validated();

            $user=strtolower(substr($request->firstName,0,1).substr($request->lastName,0,strrpos($request->lastName,' ')).substr($request->cardId,strlen($request->cardId)-4,4));
            
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

            $user = User::create([
                'user'=>$user,
                'email'=>$request->email,
                'password' => Hash::make($request->cardId),
                'person_id'=>$person->id,
            ]);

            if(is_valid_date_for_project($request->admissionDate, current_user()->project)){
                $stakeholderPerson = StakeholderPerson::create([
                    'stakeholder_id'=>$request->stakeholder_id,
                    'person_id'=>$person->id,
                    'admissionDate'=>$request->admissionDate,
                    'position_id'=>$request->position_id,
                    'department_id'=>$request->department_id,
                ]);
            }else{
                return back()->withErrors(__('messages.admissionDateNoValid'));
            }
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function storeExist(StoreExistPersonRequest $request)
    {
        try{
            $request ->validated();

            $person = Person::find($request->person_id);

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
            
            $person->update([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'fullName'=>$request->fullName,
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

            if(is_valid_date_for_project($request->admissionDate, current_user()->project)){
                $stakeholderPerson = StakeholderPerson::create([
                    'stakeholder_id'=>$request->stakeholder_id,
                    'person_id'=>$person->id,
                    'admissionDate'=>$request->admissionDate,
                    'position_id'=>$request->position_id,
                    'department_id'=>$request->department_id,
                ]);
            }else{
                return back()->withErrors(__('messages.admissionDateNoValid'));
            }
            return redirect()->route('people.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function edit(Person $person){
        $genders = Gender::all();
        $regions = Region::all();
        return view('people.person.edit',compact('person'))
        ->with(compact('genders'))
        ->with(compact('regions'));
    }

    public function update(UpdatePersonRequest $request)
    {
        try{
            $request->validated();
            
            $person = Person::find($request->person_id);

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
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function search(Request $request){
        try{
            $person = Person::where('cardId',$request->cardIdSearch)->first();
            return redirect()->route('people.createExist',$person)->with('success',__('messages.recordFounded'));
        }catch(Exception $e){
            return back()->withErrors(__('messages.recordNotFound'));
        }
    }
}
