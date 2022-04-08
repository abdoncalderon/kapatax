<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\QuotationRequest;
use App\Models\QuotationRequestNotification;
use Illuminate\Http\Request;
use Exception;

class QuotationRequestNotificationController extends Controller
{
    public function store(Request $request)
    {
        try{
            QuotationRequestNotification::create([
                'quotation_request_id' => $request->quotation_request_id,
                'stakeholder_id' => $request->stakeholder_id,
            ]);
            return redirect()->back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(QuotationRequestNotification $quotationRequestNotification)
    {
        try{
            $quotationRequestNotification->delete();
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
