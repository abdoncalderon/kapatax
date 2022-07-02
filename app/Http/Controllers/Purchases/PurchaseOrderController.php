<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\StakeholderPerson;
use Illuminate\Http\Request;
use Exception;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::select('purchase_orders.*')
                        ->join('project_users','purchase_orders.buyer_user_id','=','project_users.id')
                        ->where('project_users.project_id',current_user()->project_id)
                        ->where('purchase_orders.buyer_user_id',current_user()->id)
                        ->get();
        return view('purchases.purchaseOrders.index', compact('purchaseOrders'));
    }

    public function open(PurchaseOrder $purchaseOrder)
    {
        try{
            $approvers = StakeholderPerson::select('stakeholder_people.*')
                        ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                        ->where('stakeholder_people.isApprover',1)
                        ->where('stakeholders.project_id',current_user()->project_id)
                        ->get();
            return view('purchases.purchaseOrders.open', compact('purchaseOrder'))
            ->with(compact('approvers'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        try{
            
            return view('purchases.purchaseOrders.show', compact('purchaseOrder'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function sendToApprove(PurchaseOrder $purchaseOrder, Request $request)
    {
        try{
            $purchaseOrder->update([
                'approver_id'=>$request->approver_id,
                'status_id'=>'1',
            ]);
            return redirect()->route('purchaseOrders.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
