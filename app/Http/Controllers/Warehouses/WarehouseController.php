<?php

namespace App\Http\Controllers\Warehouses;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use App\Http\Requests\Warehouses\StoreWarehouseRequest;
use Illuminate\Http\Request;
use Exception;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::where('project_id',session('current_project_id'))->get();
        return view('warehouses.warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouses.warehouses.create');
    }

    public function store(StoreWarehouseRequest $request )
    {
        try{
            Warehouse::create($request ->validated());
            return redirect()->route('warehouses.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
