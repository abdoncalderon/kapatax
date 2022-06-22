<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Exception;

class ApprovalOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::select('purchase_orders.*')
                    ->join('stakeholder_people','purchase_orders.approver_id','=','stakeholder_people.id')
                    ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                    ->where('stakeholders.project_id',current_user()->project_id)
                    ->where('purchase_orders.approver_id',current_user()->user->person_id)
                    ->get();
        return view('session.myApprovalsOrders.index',)
        ->with(compact('purchaseOrders'));
    }

    public function showOrder(PurchaseOrder $purchaseOrder)
    {
        return view('session.myApprovalsOrders.showOrder', compact('purchaseOrder'));
    }

    public function approve($id, $status){
        try{
            $purchaseOrder = PurchaseOrder::find($id);
            $purchaseOrder->update([
                'status_id'=> $status,
            ]);
            
            return redirect()->route('myApprovalOrders.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function reject($id, $status){
        try{
            $purchaseOrder = PurchaseOrder::find($id);
            $purchaseOrder->update([
                'status_id'=> $status,
            ]);
            
            return redirect()->route('myApprovalOrders.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
}
