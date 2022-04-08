<?php

namespace App\Http\Controllers\Materials;

use App\Http\Controllers\Controller;
use App\Models\DestockingRequest;
use Illuminate\Http\Request;
use Exception;

class DestockingRequestController extends Controller
{
    public function index()
    {
        $destockingRequests = DestockingRequest::select('destocking_requests.*')
                    ->join('project_users','destocking_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->get();
        return view('materials.destockingRequests.index', compact('destockingRequests'));
    }


    public function open(DestockingRequest $destockingRequest)
    {
        try{
            return view('materials.destockingRequests.open', compact('destockingRequest'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    
}
