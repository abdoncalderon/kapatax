<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\QuotationRequest;
use App\Models\Unity;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Exception;

class QuotationRequestController extends Controller
{
    public function index()
    {
        $stakeholderPerson = active_stakeholder(current_user()->user->person);
        $myQuotationRequests = QuotationRequest::select('quotation_requests.*')
                    ->join('project_users','quotation_requests.buyer_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('quotation_requests.stakeholder_id',$stakeholderPerson->stakeholder_id)
                    ->get();
        return view('session.myQuotationRequests.index', compact('myQuotationRequests'));
    }

    public function open(QuotationRequest $myQuotationRequest){
        return view('session.myQuotationRequests.open', compact('myQuotationRequest'));
    }

    public function accept(QuotationRequest $myQuotationRequest){
        try{
            $myQuotationRequest->update([
                'status_id'=>'2',
            ]);

            $myQuotation = Quotation::create([
                'quotation_request_id'=>$myQuotationRequest->id,
                'status_id'=>'1',
            ]);

            return redirect()->route('myQuotations.quote',$myQuotation);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function reject(QuotationRequest $myQuotationRequest){
        try{
            $myQuotationRequest->update([
                'status_id'=>'1',
            ]);
            return redirect()->route('myQuotationRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
