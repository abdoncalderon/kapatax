<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;
use Exception;

class GenderController extends Controller
{
    public function store(Request $request)
    {
        try{
            Gender::create([
                'name'=>$request->name,
            ]);
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
