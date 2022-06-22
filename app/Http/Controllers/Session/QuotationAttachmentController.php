<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationAttachment;
use Illuminate\Http\Request;
use Exception;

class QuotationAttachmentController extends Controller
{
    public function store(Request $request){
        try{
            if($request->hasFile('file'))
            {
                $file = $request->file('file');
                $originalFilename = $file->getClientOriginalName();
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/commercial/purchases/quotations/attachments/',$filename);
                QuotationAttachment::create([
                    'quotation_id'=>$request->quotation_id,
                    'filename'=>$originalFilename,
                    'file'=>$filename,
                ]);
                $myQuotation = Quotation::find($request->quotation_id);
                return redirect()->route('myQuotations.quote',$myQuotation);
            }else{
                return back()->withErrors(__('messages.fileNotFound'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(QuotationAttachment $myQuotationAttachment)
    {
        try{
            $myQuotationAttachment->delete();
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
