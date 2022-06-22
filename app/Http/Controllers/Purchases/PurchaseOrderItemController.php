<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrderItem;
use App\Models\Brand;
use App\Models\Unity;
use App\Models\Group;
use App\Models\Material;
use App\Models\Family;
use Illuminate\Http\Request;
use Exception;

class PurchaseOrderItemController extends Controller
{
    public function destroy(PurchaseOrderItem $purchaseOrderItem)
    {
        try{
            $purchaseOrderItem->delete();
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 

    public function associate(PurchaseOrderItem $purchaseOrderItem)
    {
        try{
            $brands = Brand::get();
            $unities = Unity::get();
            $groups = Group::get();
            $materials = Material::where('project_id',session('current_project_id'))->get();
            $families = Family::where('project_id',session('current_project_id'))->get();
            return view('purchases.purchaseOrderItems.associate')
            ->with(compact('purchaseOrderItem'))
            ->with(compact('brands'))
            ->with(compact('unities'))
            ->with(compact('groups'))
            ->with(compact('materials'))
            ->with(compact('families'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function update(PurchaseOrderItem $purchaseOrderItem, Request $request)
    {
        try{
            $purchaseOrderItem->update([
                'material_id'=>$request->material_id,
            ]);
            return redirect()->route('purchaseOrders.open',$purchaseOrderItem->purchaseOrder);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function getQuantity(Request $request, $id)
    {
        if($request->ajax())
        {
            $purchaseOrderItem = PurchaseOrderItem::find($id);
            
            return response()->json($purchaseOrderItem);
        }
    }
}
