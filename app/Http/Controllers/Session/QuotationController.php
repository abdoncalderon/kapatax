<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\Unity;
use Exception;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(){
        $stakeholderPerson = active_stakeholder(current_user()->user->person);
        $myQuotations = Quotation::where('stakeholder_id',$stakeholderPerson->stakeholder_id)
                                    ->get();
        return view('session.myQuotations.index', compact('myQuotations'));
    }

    public function open(Quotation $myQuotation){
        
        return view('session.myQuotations.open', compact('myQuotation'));
    }

    public function show(Quotation $myQuotation){
        return view('session.myQuotations.show', compact('myQuotation'));
    }

    public function accept(Quotation $myQuotation){
        try{
            $myQuotation->update([
                'status_id'=>'1',
            ]);
            
            foreach($myQuotation->quotationRequest->quotationRequestItems as $quotationRequestItem){
                $quotationRequestItem->update([
                    'status_id'=> '1',
                ]);
            }
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function reject(Quotation $myQuotation){
        try{
            $myQuotation->update([
                'status_id'=>'2',
            ]);
            foreach($myQuotation->quotationRequest->quotationRequestItems as $quotationRequestItem){
                $quotationRequestItem->update([
                    'status_id'=> '2',
                ]);
            }
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
