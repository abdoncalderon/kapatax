<?php

namespace App\Http\Controllers;

Use App\User;
Use App\Models\Permit;
use App\Http\Requests\UpdatePermitRequest;


class PermitController extends Controller
{
    public function index(User $user)
    {
        return view('permits.index', compact('user'));
    }

    public function edit(UpdatePermitRequest $request, Permit $permit)
    {
        
        return view('permits.edit',[
            'permit'=>$permit
            ]);
    }
    
    public function update(Permit $permit, UpdatePermitRequest $request)
    {
        $user = $permit->user;
        $createfolio = $request->has('create_folio');
        $createdailyreport = $request->has('create_dailyreport');
        $createnote = $request->has('create_note');
        $createcomment = $request->has('create_comment');
        $printdailyreport = $request->has('print_dailyreport');
        $printnote = $request->has('print_note');
        $printfolio = $request->has('print_folio');
        $editsequence = $request->has('edit_sequence');
        $request->validated();
        $permit->update([
            'create_folio'=>$createfolio,
            'create_dailyreport'=>$createdailyreport,
            'create_note'=>$createnote,
            'create_comment'=>$createcomment,
            'print_dailyreport'=>$printdailyreport,
            'print_note'=>$printnote,
            'print_folio'=>$printfolio,
            'edit_sequence'=>$editsequence,
        ]);
        return redirect()->route('permits.index',$user);
    }
}
