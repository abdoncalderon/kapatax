<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\Unity;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(){
        $stakeholderPerson = active_stakeholder(current_user()->user->person);
        $myQuotations = Quotation::select('quotations.*')
                    ->join('quotation_requests','quotations.quotation_request_id','=','quotation_requests.id')
                    ->join('project_users','quotation_requests.buyer_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('quotation_requests.stakeholder_id',$stakeholderPerson->stakeholder_id)
                    ->get();
        return view('session.myQuotations.index', compact('myQuotations'));
    }

    public function quote(Quotation $myQuotation){
        $unities = Unity::all();
        return view('session.myQuotations.quote', compact('myQuotation'))
        ->with(compact('unities'));
    }

    public function show(Quotation $myQuotation){
        return view('session.myQuotations.show', compact('myQuotation'));
    }

    public function send(Quotation $myQuotation){
        try{
            $myQuotation->update([
                'status_id'=>'3',
                'seller_user_id'=>current_user()->id,
                'answerDate'=>Carbon::now()->toDateString(),
            ]);
            return redirect()->route('myQuotations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
 