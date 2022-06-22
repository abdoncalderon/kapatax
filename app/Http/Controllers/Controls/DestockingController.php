<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use Illuminate\Http\Request;
use Exception;

class DestockingController extends Controller
{
    public function index()
    {
        $needRequests = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->get();
        return view('controls.destocking.index', compact('needRequests'));
    }

    public function open(NeedRequest $needRequest)
    {
        try{
            return view('controls.destocking.open', compact('needRequest'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
