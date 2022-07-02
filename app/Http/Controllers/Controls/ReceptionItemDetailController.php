<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReceptionItem;
use App\Models\ReceptionItemDetail;
use Exception;

class ReceptionItemDetailController extends Controller
{
    public function index(ReceptionItem $receptionItem){
        try{
            return view('controls.receptionItemDetails.index')
            ->with(compact('receptionItem'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function store(Request $request){
        try{
            ReceptionItemDetail::create([
                'reception_item_id'=>$request->reception_item_id,
                'serialNumber'=>$request->serialNumber,
                'partNumber'=>$request->partNumber,
            ]);
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(ReceptionItemDetail $receptionItemDetail){
        try{
            $receptionItemDetail->delete();
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
