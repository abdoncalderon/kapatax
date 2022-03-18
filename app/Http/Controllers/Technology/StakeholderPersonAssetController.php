<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use App\Models\StakeholderPerson;
use App\Models\StakeholderPersonAsset;
use App\Models\Asset;
use Illuminate\Http\Request;

class StakeholderPersonAssetController extends Controller
{
    public function index(StakeholderPerson $stakeholderPerson)
    {
        $stakeholderPersonAssets = StakeholderPersonAsset::select('stakeholder_person_assets.*')
                            ->join('stakeholder_people','stakeholder_person_assets.stakeholder_person_id','=','stakeholder_people.id')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->where('stakeholder_person_assets.stakeholder_person_id',$stakeholderPerson->id)
                            ->get();
        return view('technology.stakeholderPersonAssets.index', compact('stakeholderPerson'))
        ->with(compact('stakeholderPersonAssets'));
    }

    public function create(StakeholderPerson $stakeholderPerson)
    {
        $assets = Asset::select('assets.*')
                ->join('stock_movements','assets.stock_movement_id','=','stock_movements.id')
                ->join('materials','stock_movements.material_id','=','materials.id')
                ->where('materials.project_id',session('current_project_id'))
                ->where('assets.status_id',1)
                ->get();

        return view('technology.stakeholderPersonAssets.create', compact('stakeholderPerson'))
        ->with(compact('assets'));
    }
}
