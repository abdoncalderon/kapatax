<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use App\Models\StakeholderPerson;
use Illuminate\Http\Request;

class StakeholderPersonController extends Controller
{
    public function index()
    {
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->where('stakeholders.stakeholder_type_id',1)
                            ->get();
        return view('technology.stakeholderPeople.index', compact('stakeholderPeople'));
    }
}
