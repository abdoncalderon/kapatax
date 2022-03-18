<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\Zone;
use App\Models\Unity;
use App\Http\Requests\Session\StoreNeedRequestRequest;
use App\Http\Requests\Session\UpdateNeedRequestRequest;
use Illuminate\Http\Request;
use Exception;

class NeedRequestController extends Controller
{
    public function index()
    {
        $myNeedRequests = NeedRequest::where('project_user_id',current_user()->id)->get();
        return view('session.myNeedRequests.index', compact('myNeedRequests'));
    }

    public function create()
    {
        $zones = Zone::where('project_id',current_user()->project_id)->get();
        return view('session.myNeedRequests.create')
        ->with(compact('zones'));
    }

    public function store(StoreNeedRequestRequest $request )
    {
        try{
            $needRequest = NeedRequest::create($request->validated());
            return redirect()->route('myNeedRequests.edit',$needRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(NeedRequest $myNeedRequest)
    {
        return view('session.myNeedRequests.show',[
            'myNeedRequest'=>$myNeedRequest
            ]);
    }

    public function edit(NeedRequest $myNeedRequest)
    {
        $zones = Zone::where('project_id',current_user()->project_id)->get();
        $unities = Unity::get();
        return view('session.myNeedRequests.edit',[
            'myNeedRequest'=>$myNeedRequest
            ])->with(compact('zones'))
            ->with(compact('unities'));
    }

    public function modify(NeedRequest $myNeedRequest)
    {
        $zones = Zone::where('project_id',current_user()->project_id)->get();
        $unities = Unity::get();
        return view('session.myNeedRequests.modify',[
            'myNeedRequest'=>$myNeedRequest
            ])->with(compact('zones'))
            ->with(compact('unities'));
    }
    
    
    public function update(NeedRequest $myNeedRequest, UpdateNeedRequestRequest $request)
    {
        try{
            $myNeedRequest->update($request->validated());
            if($request->status_id==1){
                
                update_need_request_items_status($myNeedRequest,1);
            }
            return redirect()->route('myNeedRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(NeedRequest $myNeedRequest)
    {
        try{
            $myNeedRequest->delete();
            return redirect()->route('myNeedRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    

    
}
