<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use App\Models\StockMovement;
use App\Models\Material;
use App\Http\Requests\Controls\StoreReceptionRequest;
use Carbon\Carbon;
use Exception;

class ReceptionController extends Controller
{
    public function index()
    {
        $receptions = Reception::select('receptions.*')
                        ->join('project_users','receptions.receiver_user_id','=','project_users.id')
                        ->where('project_users.project_id',current_user()->project_id)
                        ->get();
        return view('controls.receptions.index')
        ->with(compact('receptions'));
    }

    public function create()
    {
        return view('controls.receptions.create');
    }

    public function store(StoreReceptionRequest $request)
    {
        try{
            if ($request->has('file')){
                $file = $request->file('file');
                $originalFilename = $file->getClientOriginalName();
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/commercial/controls/receptions/documents/',$filename);
            }else{
                $filename = '';
            }
            $request->validated();
            $reception = Reception::create([
                'purchase_order_id'=>$request->purchase_order_id,
                'warehouse_id'=>$request->warehouse_id,
                'date'=> Carbon::now()->toDateString(),
                'type_id'=>$request->type_id,
                'documentNumber'=>$request->documentNumber,
                'digitalFile'=>$filename,
                'receiver_user_id'=>$request->receiver_user_id,
            ]);
            
            return redirect()->route('receptions.edit',$reception);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function edit(Reception $reception)
    {
        return view('controls.receptions.edit')
        ->with(compact('reception'));
    }

    public function process(Reception $reception)
    {
        try{
            foreach($reception->receptionItems as $receptionItem)
            {
                $material = Material::find($receptionItem->purchaseOrderItem->material_id);
                $balance = $material->stock + $receptionItem->quantity;
                $stockMovement = StockMovement::create([
                    'date' => Carbon::now()->toDateString(),
                    'need_request_item_id' => $receptionItem->reception->purchaseOrder->quotation->quotationRequest->purchaseRequest->need_request_id,
                    'transactionType_id' => '2',
                    'material_id' => $receptionItem->purchaseOrderItem->material_id,
                    'quantity' => $receptionItem->quantity,
                    'balance' =>  $balance,
                    'warehouse_id' => $reception->warehouse_id,
                    'project_user_id' => current_user()->id,
                ]);
            }
            $reception->update([
                'status_id'=>'1',
            ]);

            $material->update([
                'stock'=>$balance,
            ]);
            return redirect()->route('receptions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Reception $reception)
    {
        return view('controls.receptions.show')
        ->with(compact('reception'));
    }
}
