<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\Material;
use App\Models\NeedRequestItem;
use App\Models\Stakeholder;
use App\Models\StakeholderPerson;
use App\Models\StakeholderPersonAsset;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class DestockingController extends Controller
{
    public function index()
    {
        $needRequests = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.applicant_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    // ->where('need_requests.status_id','4')
                    ->get();
        return view('controls.destocking.index', compact('needRequests'));
    }

    public function open(NeedRequest $needRequest)
    {
        try{
            return view('controls.destocking.open', compact('needRequest'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function create(NeedRequestItem $needRequestItem)
    {
        $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))->get();
        $materials = Material::where('project_id',session('current_project_id'))->get();
        $warehouses = Warehouse::where('project_id',session('current_project_id'))->get();

        return view('controls.destocking.destocking', compact('needRequestItem'))
        ->with(compact('stakeholderPeople'))
        ->with(compact('warehouses'))
        ->with(compact('materials'));
    }

    public function destocking(NeedRequestItem $needRequestItem, Request $request)
    {
        try{

            /* get values for balance*/

            $material = Material::find($request->material_id);
            $balance = $material->stock - $request->quantity;
            $needRequest = NeedRequest::find($request->need_request_id);

            /* create stock movement*/
            
            $stockMovement = StockMovement::create([
                'date' => Carbon::now()->toDateString(),
                'transactionType_id' => '1',
                'material_id' => $request->material_id,
                'quantity' => $request->quantity,
                'unitPrice' => $material->lastUnitPrice,
                'balance' =>  $balance,
                'warehouse_id' => $request->warehouse_id,
                'project_user_id' => current_user()->id,
                'stakeholder_person_id' => $request->stakeholder_person_id,
            ]);

            /** update balance in material */

            $material->update([
                'stock' => $balance,
            ]);

            /** if balance is empty then material status is out of stock */

            if ($balance == 0){
                $material->update([
                    'status_id' => '0',
                ]);
            }

            /** update need request item status in delivered */

            $needRequestItem->update([
                'status_id' => '8',
            ]);

            if (($material->group_id==3)||($material->group_id==4)){
                StakeholderPersonAsset::create([
                    'stakeholder_person_id'=>'',
                    'asset_id'=>'',

                ]);
            }


            /** if all items were delivered then update status need request in complete */

            if (all_items_delivered($needRequest)){
                $needRequest->update([
                    'status_id'=>'5'
                ]);
            }

            return redirect()->route('destocking.open', $needRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
