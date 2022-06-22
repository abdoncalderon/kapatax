<?php

namespace App\Http\Controllers\Materials;

use App\Http\Controllers\Controller;
use App\Models\DestockingRequestItem;
use App\Models\Material;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Models\StakeholderPerson;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class StockMovementController extends Controller
{
    public function createDestocking(DestockingRequestItem $destockingRequestItem)
    {

        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))->get();
        $materials = Material::where('project_id',session('current_project_id'))->get();
        $warehouses = Warehouse::where('project_id',session('current_project_id'))->get();

        return view('materials.stockMovements.destocking', compact('destockingRequestItem'))
        ->with(compact('stakeholderPeople'))
        ->with(compact('warehouses'))
        ->with(compact('materials'));
    }
    
    public function destocking(DestockingRequestItem $destockingRequestItem, Request $request)
    {
        try{
            $material = Material::find($request->material_id);
            $balance = $material->stock - $request->quantity;
            $needRequest = NeedRequest::find($request->need_request_id);
            $needRequestItem = NeedRequestItem::find($request->need_request_item_id);
            
            $stockMovement = StockMovement::create([
                'date' => Carbon::now()->toDateString(),
                'transactionType_id' => '1',
                'need_request_item_id' => $request->need_request_item_id,
                'material_id' => $request->material_id,
                'quantity' => $request->quantity,
                'balance' =>  $balance,
                'warehouse_id' => $request->warehouse_id,
                'project_user_id' => current_user()->id,
                'receiver_id' => $request->receiver_id,
            ]);

            if ($balance == 0){
                $status_id = 0;
                $material->update([
                    'status_id' => $status_id,
                ]);
            }

            $needRequest->update([
                'status_id' => '7',
            ]);

            $needRequestItem->update([
                'status_id' => '8',
            ]);

            return redirect()->route('destockingRequest.open', $destockingRequestItem->destockingRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
